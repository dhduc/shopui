<?php

namespace App\Http\Controllers\Home;

use App\Customer;
use App\OrderDetail;
use App\Product;
use App\Order;
use App\Configs;
use App\Images;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use DB;
use View;
use Route;

class CartController extends HomeController
{
    public $tax;
    public $ship;

    public function __construct(){
        // Config
        $config = Configs::all()->first();
        $this->tax = $config['tax'];
        $this->ship = $config['ship'];

        // Info
        $this->action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);

        // Category
        $categories = Category::all()->toArray();
        $data = array();
        foreach($categories as $value){
            $data[] = $value;
        }
        // Cart Item
        $cartItem = $this->allCart();

        // All Categories
        $allCategoriesInView = $this->allCategories();


        // Display
        View::share(array(
            'config' => $config,
            'action_name' => $this->action_name,
            'data' => $data,
            'cartItem' => $cartItem,
            'allCategoriesInView' => $allCategoriesInView,

        ));
    }

    /* ----------------------------------------------- Insert Item to Cart ------------------------------------------ */
    public function insert(Request $request){
        if(!isset($request)){
            return redirect(URL::previous())->withError("Error");
        }
        $msg = "";
        $flag = false;
        if(Session::has('product')){
            $products = Session::get('product');
            foreach($products as $item){//
                    if($item['id'] == $request->id){
                        $flag = true;
                        $msg = "Product Item Exists";
                    }
            }
        }
        if($flag == false){

            $result = Product::find($request->id);

            $image = $result->image;
            $name = $result->name;
            $price = $result->price;
            $total = $request->number*$price;
            $data = array(

                'id' => $request->id,
                'image' => $image,
                'name' => $name,
                'number' => $request->number,
                'price' => $price,
                'total' => $total,
            );
            Session::push('product', $data);
            $msg = "Product Item In Cart";
        }

        return redirect(URL::previous())->withSuccess($msg);
    }

    /* ----------------------------------------------- View All Item in Cart ------------------------------------------ */
    public function viewCart()
    {
        $allItem = $this->allItem("view");
        $total = $this->total;
        return view('home.cart.list')->with(['allItem' => $allItem, 'total' => $total]);
    }

    /* ----------------------------------------------- Get All Item in Cart ------------------------------------------ */
    public function allItem($type){
        $allItem = "";
        $total = 0;
        if (Session::has('product')) {
            $products = Session::get('product');
            if (count($products) > 0) {
                foreach ($products as $item) {
                    $images = Images::where('productID', $item["id"])->first();
                    $thumbnail = $images['imageSrc'];
                    if($type == "view"){

                        $allItem .= '<td class="goods-page-image"><input type="hidden" name="id[]" value="' . $item["id"] . '" />
                            <a href="' . URL::to('/product/') . '/' . $item["id"] . '" target="_blank"><img src="' . URL::to('/') . '/' . $thumbnail . '" alt=""></a>
                            </td>';
                        $allItem .= '<td class="goods-page-description">
                         <h3><a href="' . URL::to('/product/') . '/' . $item["id"] . '" target="_blank">' . $item['name'] . '</a></h3>
                            </td>';
                        $allItem .= '<td class="goods-page-quantity">
                            <div class="product-quantity">
                            <div class="input-group bootstrap-touchspin input-group-sm"><span class="input-group-btn">
                            <button class="btn quantity-down bootstrap-touchspin-down" type="button">
                            <i class="fa fa-angle-down"></i></button></span>
                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                            <input name="number[]" id="product-quantity" type="text" value="' . $item['number'] . '" readonly="" class="form-control input-sm" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn quantity-up bootstrap-touchspin-up" type="button"><i class="fa fa-angle-up"></i></button></span></div>
                            </div>
                          </td>';
                        $allItem .= '<td class="goods-page-price">
                            <strong><span>$</span>' . $item['price'] . '</strong>
                            </td>';
                        $allItem .= '<td class="goods-page-total">
                            <strong><span>$</span>' . $item['total'] . '</strong>
                            </td>';
                        $allItem .= '<td class="del-goods-col">
                            <a class="del-goods" href="' . URL::to('/cart/remove') . '/' . $item['id'] . '">&nbsp;</a>
                         </td></tr>';
                    }
                    else if($type == "checkout"){
                        $allItem .= '<tr><input type="hidden" name="productID[]" value="'.$item['id'].'" />
                            <td class="goods-page-image">
                            <a href="' . URL::to('/product/') . '/' . $item['id'] . '" target="_blank"><img src="' . URL::to('/') . '/' . $thumbnail . '" alt=""></a>
                            </td>';
                        $allItem .= '<td class="goods-page-description">
                         <h3><a href="' . URL::to('/product/') . '/' . $item['id'] . '" target="_blank">' . $item['name'] . '</a></h3>
                            </td>';
                        $allItem .= '<td class="goods-page-quantity">
                            <div class="">
                                <h3>' . $item['number'] . '</h3>
                                <input name="pQty[]" id="product-quantity" type="hidden" value="' . $item['number'] . '" readonly class="form-control input-sm" style="display: block;">

                            </div>
                          </td>';
                        $allItem .= '<td class="goods-page-price">
                            <strong><span>$</span>' . $item['price'] . '</strong>
                            </td>';
                        $allItem .= '<td class="goods-page-total">
                            <strong><span>$</span>' . $item['total'] . '</strong>
                            </td></tr>';

                    }

                    $total += $item['total'];
                }
                $this->total = $total;
            } else {
                return redirect(URL::to('/'))->withSuccess("Shopping cart empty");
            }
        } else {
            return redirect(URL::to('/'))->withSuccess("Shopping cart empty");
        }
        return $allItem;
    }

    /* ----------------------------------------------- Update Item in Cart ------------------------------------------ */
    public function updateCart(Request $request){
        $item = $request->id;
        Session::forget('product');
        foreach($item as $index => $key ){
            $result = Product::find($key);
            $image = $result->image;
            $name = $result->name;
            $price = $result->price;
            $total = $request->number[$index]*$price;
            $data = array(
                'token' => $request->_token,
                'id' => $key,
                'image' => $image,
                'name' => $name,
                'number' => $request->number[$index],
                'price' => $price,
                'total' => $total,
            );
            Session::push('product', $data);
        }
        return redirect("cart/view")->withSuccess("Shopping cart update");
    }
    /* ----------------------------------------------- Remove a Item in Cart ------------------------------------------ */
    public function removeCart($id){

        if(Session::has('product')){
            $products = Session::get('product');
            $key = 0;
            if(count($products) > 1){
                foreach($products as $index => $item){
                    if($item['id'] == $id){
                        $key = $index;
                    }
                }
                Session::forget('product.'.$key.'');
                return redirect("cart/view")->withSuccess("Product item remove");
            }
            else {
                Session::forget('product');
                return redirect(URL::to('/'))->withSuccess("Shopping cart empty");
            }
        }

    }
    /* ----------------------------------------------- Remove All Item in Cart ------------------------------------------ */
    public function emptyCart(){
        if(Session::has('product')){
            Session::forget('product');
            return redirect(URL::to('/'))->withSuccess("Shopping cart empty");
        }
    }
    /* ----------------------------------------------- Checkout Order ------------------------------------------ */

    public function checkout(){
        $allItem = $this->allItem("checkout");
        $total = $this->total;
        return view('home.cart.checkout')->with(['allItem' => $allItem, 'total' => $total]);
    }

    public function checkoutOrder(Request $request){

        DB::transaction(function () use ($request) {
            try {
                // Cart Item
                $productID = $request->productID;
                $totalOrder = 0;
                foreach($productID as $index => $id ){
                    $result = Product::find($id);
                    $price = $result->price;
                    $totalOrder += $request->pQty[$index]*$price;
                }

                // Create Customer
                $fullname = $request->fullname;
                $email = $request->email;
                $telephone = $request->telephone;
                $address = $request->address;
                $city = $request->city;
                $customerInfo = array('fullname'=>$fullname, 'email'=>$email, 'telephone'=>$telephone, 'address'=>$address, 'city'=>$city);
                $customer=new Customer();
                autoAssignDataToProperty($customer,$customerInfo);
                $customer->save();

                // Create Order
                $userID = $request->userID;
                $customerID = $customer->id;
                $datetime = date('Y-m-d H:i:s');
                $totalOrder = $totalOrder + $totalOrder*($this->tax/100)+$this->ship;
                $status = "Pending";
                $note = $request->note;
                $orderInfo = array('userID'=>$userID,'customerID'=>$customerID, 'datetime'=>$datetime,'total'=>$totalOrder,'note'=>$note,'status'=>$status);
                $order=new Order();
                autoAssignDataToProperty($order,$orderInfo);
                $order->save();

                // Create Order Detail
                $orderDetail = new OrderDetail();
                $orderID = $order->id;
                $productID = $request->productID;

                $total = 0;
                $orderProduct = array();
                foreach($productID as $index => $id ){
                    $result = Product::find($id);
                    $name = $result->name;
                    $price = $result->price;
                    $total = $request->pQty[$index]*$price;
                    // Update product
                    $oldNumber = $result->number;
                    if($oldNumber <=0 ){
                        Session::forget('product');
                        return redirect(URL::to('/'))->withSuccess("Sorry, product in your cart was closed");
                    }
                    $newPurchase = $result->purchase + $request->pQty[$index];
                    $user = Product::where('id', $id)
                        ->update(['number' => $oldNumber - $request->pQty[$index], 'purchase' => $newPurchase]);
                    // Create order detail
                    $data = array(
                        'orderID' => $orderID,
                        'productID' => $id,
                        'pName' => $name,
                        'pPrice' => $price,
                        'pQty' => $request->pQty[$index],
                        'total' => $total,
                    );
                    autoAssignDataToProperty($orderDetail,$data);
                    $orderProduct[] = $data;
                }
                $orderDetail->insert($orderProduct);

                // Delete Cart
                Session::forget('product');
            } catch(ValidationException $e)
            {

                DB::rollback();
                return redirect(URL::to('/'))->withErrors("Checkout error! Please try again");
            } catch(\Exception $e)
            {
                DB::rollback();
                throw $e;
            }

        });
        DB::commit();
        return redirect(URL::to('/'))->withSuccess("Checkout success! Our cumstomer's support will call you to confirm");

    }
}
