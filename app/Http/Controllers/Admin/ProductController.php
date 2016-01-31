<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use Lang;
use View;
use Route;
use App;
use App\Category;
use DB;
use App\Images;



class ProductController extends Controller {


    public function __construct(){
        $this->middleware('auth');
        $title = 'Product Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }


    public function childCategories($item, $id, $type, $result, $prefix="----")
    {
        $childCategories = "";
        foreach ($item as $child) {
            if ($child['parent_id'] == $id) {

                if($type == 'create'){
                    $childCategories .= '<option value="'.$child["id"].'" />';
                }
                if($type == 'edit'){
                    if($child['id'] == $result->category_id){
                        $childCategories .= '<option value="'.$child["id"].'" selected>';
                    }
                    else {
                        $childCategories .= '<option value="'.$child["id"].'">';
                    }
                }
                $childCategories .= $prefix.$child['name'];
                $childCategories .= '</option>';
                $childCategories .= $this->childCategories($item, $child['id'], $type, $result, $prefix="----");
            }
        }
        return $childCategories;
    }

    public function allCategories($type, $result){
        $categories = Category::all()->toArray();
        $listCategories = array();
        foreach($categories as $value){
            $listCategories[] = $value;
        }
        $allCategories = "";
        foreach ($listCategories as $item) {
            if ($item['parent_id'] == 0) {
                if($type == 'create'){
                    $allCategories .= '<option value="'.$item["id"].'" />';
                }
                if($type == 'edit'){
                    if($item['id'] == $result->category_id){
                        $allCategories .= '<option value="'.$item["id"].'" selected>';
                    }
                    else {
                        $allCategories .= '<option value="'.$item["id"].'">';
                    }
                }
                $allCategories .= '* '.$item['name'];
                $allCategories .= '</option>';
                $allCategories .= $this->childCategories($listCategories, $item['id'], $type, $result);
            }
        }
        return  $allCategories;
    }

    public function allProducers($type, $id){
        $allProducers = "";
        $producers = App\Producer::all()->toArray();
        $listProducers = array();
        foreach($producers as $value){
            $listProducers[] = $value;
        }
        foreach($listProducers as $producer){
            if($type == 'create'){
                $allProducers .= "<option value='".$producer['id']."'>";
            }
            else if($type == 'edit'){
                if($producer['id'] == $id){
                    $allProducers .= "<option value='".$producer['id']."' selected>";
                }
                else {
                    $allProducers .= "<option value='".$producer['id']."'>";
                }
            }
            $allProducers .= $producer['producer'];
            $allProducers .= "</option>";

        }
        return $allProducers;
    }

    public function create(){

        $allCategoriesInView = "";
        $allCategoriesInView = $this->allCategories("create", "");

        $allProducers = $this->allProducers('create', "");

        return view('admin.product.create')->with(['allCategoriesInView' => $allCategoriesInView, 'allProducers' => $allProducers ]);
    }




    public function store(ProductRequest $request) {

        DB::transaction(function () use ($request) {
            $model=new Product();
            autoAssignDataToProperty($model,$request->all());
            $model->save();
            $product_id = $model->id;
            $images = new Images();
            if($request->hasFile('images'))
            {
                $listImage = array();
                $files = $request->file('images');
                foreach($files as $file){
                    $name = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture = time() . $name . '.' . $extension;
                    $file->move('images/product', $picture);
                    $src = 'images/product/' . $picture;
                    $data = array(
                        'productID' => $product_id,
                        'imageName' => $name,
                        'imageSrc' => $src
                    );
                    autoAssignDataToProperty($images,$data);
                    $listImage[] = $data;
                }
                $images->insert($listImage);
            }
        });
        DB::commit();



        return redirect()->action('Admin\ProductController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        $result = Product::find($id);


        $allCategoriesInView = $this->allCategories("edit", $result);

        $producerID = $result->producer;
        $allProducers = $this->allProducers('edit', $producerID);
        return view('admin.product.edit', compact('result'))->with(['allCategoriesInView'=> $allCategoriesInView, 'allProducers' => $allProducers]);
    }

    public function update(ProductRequest $request, $id){

        $data = $request->all();
        $model = Product::find($id);
        autoAssignDataToProperty($model,$request->all());

        $model->save();
        return redirect()->action('Admin\ProductController@index')->withSuccess(Lang::get('messages.create_success'));

    }

    public function destroy($id){
        DB::transaction(function() use($id) {
            Product::find($id)->delete();
            $images = Images::where('productID', $id)->get();
            foreach($images as $image){
                $src = $image->imageSrc;
                unlink($src);
            }
            Images::where('productID', $id)->delete();
        });
        DB::commit();
        return redirect_success('Admin\ProductController@index',Lang::get('messages.delete_success'));
    }




    /* -------------------------------------- List All Product -------------------------------------- */
    public function index() {
        return view('admin.product.list');
    }
    public function stock() {
        return view('admin.product.stock');
    }
    public function closed() {
        return view('admin.product.closed');
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

        $model = new Product;
        if($type == "all"){
            $result = $model->getDataForProductList($dataRequest,$config, "all");
        }
        else if($type == "stock"){
            $result = $model->getDataForProductList($dataRequest,$config, "stock");
        }
        else if($type == "closed"){
            $result = $model->getDataForProductList($dataRequest,$config, "closed");
        }


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

    public function setThumbnail(){
        $products = Product::all()->toArray();

        foreach($products as $item){
            $images = Images::where('productID', $item['id'])->first();
            $thumbnail = $images['imageSrc'];
            $model = Product::find($item['id']);
            $model->thumbnail = $thumbnail;
            $model->save();
        }
        return redirect_success('Admin\ProductController@index', "Set Thumbnail Success");
    }

}