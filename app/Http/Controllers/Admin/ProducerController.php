<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProducerRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Producer;
use Lang;
use View;
use Route;
use Illuminate\Support\Facades\URL;


class ProducerController extends Controller {


    public function __construct(){
        $this->middleware('auth');
        $title = 'Producer Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index() {
        return view('admin.producer.list');
    }

    public function getDataAjax(Request $request){
        $dataRequest = $request->all();
        $pageCurrent = $dataRequest['current'];
        $limit = $dataRequest['rowCount'];
        $offset = ($pageCurrent -1)*$limit;

        $config = array(
            'limit'=>$limit,
            'offset'=>$offset,
        );

        $model = new Producer;
        $result = $model->getDataForPaginationAjax($dataRequest,$config);

        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action_list('admin/producer', $item->id);
        }

        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();
        die(json_encode($data));
    }

    public function create(){
        return view('admin.producer.create');
    }


    public function store(ProducerRequest $request) {
        $model=new Producer();
        autoAssignDataToProperty($model,$request->all());
        // Logo
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = time().$name .'.'.$extension;
            $request->file('logo')->move(
                'images/brands', $picture
            );
            $logo = 'images/brands/'.$picture;
        }
        else {
            $logo = "";
        }
        $model->logo = $logo;
        $model->save();
        return redirect()->action('Admin\ProducerController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        $result = Producer::find($id);
        return view('admin.producer.edit', compact('result'));
    }

    public function update(ProducerRequest $request, $id){

        $data = $request->all();
        $model = Producer::find($id);
        autoAssignDataToProperty($model,$request->all());
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = time().$name .'.'.$extension;
            $request->file('logo')->move(
                'images/brands', $picture
            );
            $logo = 'images/brands/'.$picture;
        }
        else {
            $image = $model->toArray();
            $logo = $image['logo'];
        }
        $model->logo = $logo;
        $model->save();
        return redirect(URL::to('/')."/admin/producer/".$id."/edit")->withSuccess(Lang::get('messages.update_success'));

    }

    public function destroy($id){
        Producer::find($id)->delete();
        return redirect_success('Admin\ProducerController@index',Lang::get('messages.delete_success'));
    }

    /* -------------------------------------- List All Product Follow Producer -------------------------------------- */
    public function ProductList($id) {
        $result = Producer::find($id);
        $producerName = $result->producer;
        return view('admin.producer.product_list')->with(['producerID' => $id, 'producerName' => $producerName]);
    }
    public function getProductList(Request $request){
        $dataRequest = $request->all();
        $producerID = $request->producerID;
        $pageCurrent = $dataRequest['current'];
        $limit = $dataRequest['rowCount'];
        $offset = ($pageCurrent -1)*$limit;

        $config = array(
            'limit'=>$limit,
            'offset'=>$offset,
        );

        $model = new Product();
        $result = $model->getDataForProductList($dataRequest,$config,"producer", $producerID);


        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action('admin/product', $item->id);
        }

        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();

        die(json_encode($data));
    }

}