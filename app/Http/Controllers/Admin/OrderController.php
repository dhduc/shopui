<?php namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Order;
use App\Configs;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Lang;
use View;
use Route;
use DB;
use Illuminate\Support\Facades\URL;


class OrderController extends Controller {

    public $tax;
    public $ship;


    public function __construct(){
        $this->middleware('auth');
        $title = 'Order Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);

        // Config
        $config = Configs::all()->first();
        $this->tax = $config['tax'];
        $this->ship = $config['ship'];

        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index() {
        return view('admin.order.list');
    }
    public function pending() {
        return view('admin.order.pending');
    }
    public function on_hold() {
        return view('admin.order.on_hold');
    }
    public function closed() {
        return view('admin.order.closed');
    }
    public function cancelled() {
        return view('admin.order.cancelled');
    }



    public function getDataAjax(Request $request){
        $dataRequest = $request->all();
        $type = $request->type;
        $pageCurrent = $dataRequest['current'];
        $limit = $dataRequest['rowCount'];
        $offset = ($pageCurrent -1)*$limit;

        $config = array(
            'limit'=>$limit,
            'offset'=>$offset,
        );

        $model = new Order;
        $result = $model->getDataForPaginationAjax($dataRequest,$config, $type);

        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action('admin/order', $item->id);
        }

        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();
        die(json_encode($data));
    }


    public function store(OrderRequest $request) {
        $model=new Order();
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('OrderController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        // Order
        $order = Order::find($id);
        $orderID = $id;
        $customerID = $order->customerID;
        $status = $order->status;
//        if($status == "Cancelled" or $status == "Closed"){
//            return redirect(URL::previous())->withErrors("Order was closed!");
//        }
        $statusOrder = getStatusOrder($status);

        // Customer
        $customer = Customer::find($customerID);

        // Product list
        $product = OrderDetail::where('orderID', $orderID)->get();

        $productView = "";
        $totalOrder = 0;
        foreach($product as $item){
            $cost = Product::find($item['productID'])->cost;
            $productView .= '<tr><td>
                        <a href="#">
                            '.$item['pName'].'</a>
                    </td>
                    <td>
                        '.$cost.'
                    </td>
                    <td>
                        '.$item['pPrice'].'
                    </td>
                    <td>
                        '.$item['pQty'].'
                    </td>
                    <td>
                        '.$item['total'].'
                    </td>
                </tr>';
            $totalOrder += $item['pQty']*$item['pPrice'];
        }

        // Payment
        $totalPaid = $totalOrder + $totalOrder*($this->tax/100) + $this->ship;
        $payment = array(
            'total' => $totalOrder,
            'tax' => $this->tax,
            'tax_value' => $totalOrder*($this->tax/100),
            'ship' => $this->ship,
            'paid' => $totalPaid
        );

        return view('admin.order.edit')->with(['orderInfo' => $order, 'statusOrder' => $statusOrder, 'customerInfo' => $customer, 'productView' => $productView, 'payment' => $payment]);

    }

    public function update(OrderRequest $request, $id){
        DB::transaction(function () use ($request, $id) {
            $data = $request->all();
            $model = Order::find($id);
            $status = $request->status;
            if($status == "Cancelled"){
                $products = OrderDetail::where('orderID', $id)->get();
                foreach($products as $item){
                    $product = Product::find($item['productID']);
                    $qty = DB::table("OrderDetail")->where('orderID', $item['orderID'])->where('productID', $item['productID'])->first()->pQty;
                    $product->number += $qty;
                    $product->purchase -= $qty;
                    $product->save();
                }
            }
            $model->status = $status;
            $model->save();
        });
        DB::commit();

        return redirect(URL::to("/")."/admin/order/".$id."/edit")->withSuccess(Lang::get('messages.update_success'));

    }

    public function invoice($id){
        // Order
        $order = Order::find($id);
        $orderID = $id;
        $customerID = $order->customerID;


        // Customer
        $customer = Customer::find($customerID);

        // Product list
        $product = OrderDetail::where('orderID', $orderID)->get();

        $productView = "";
        $totalOrder = 0;
        foreach($product as $index => $item){
            $cost = Product::find($item['productID'])->cost;
            $productView .= '<tr>
                        <td> '.($index + 1).' </td>
                        <td>
                        <a href="#">
                            '.$item['pName'].'</a>
                    </td>
                    <td>
                        '.$item['pPrice'].'
                    </td>
                    <td>
                        '.$item['pQty'].'
                    </td>
                    <td>
                        '.$item['total'].'
                    </td>
                </tr>';
            $totalOrder += $item['pQty']*$item['pPrice'];
        }

        // Payment
        $totalPaid = $totalOrder + $totalOrder*($this->tax/100) + $this->ship;
        $payment = array(
            'total' => $totalOrder,
            'tax' => $this->tax,
            'tax_value' => $totalOrder*($this->tax/100),
            'ship' => $this->ship,
            'paid' => $totalPaid
        );

        return view('admin.order.invoice')->with(['orderInfo' => $order, 'customerInfo' => $customer, 'productView' => $productView, 'payment' => $payment]);


    }

    public function destroy($id){
        //Order::find($id)->delete();
        return redirect_success('OrderController@index',"Cannot delete order item");
    }

}