<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use Lang;
use View;
use Route;
use DB;
use App;
use App\Product;


class CategoryController extends Controller {

    public $allID = array();


    public function __construct(){
        $this->middleware('auth');
        $title = 'Category Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

        // Init Misc Category
        $misc = Category::find(1);
        if(!isset($misc) && $misc != null){
            $model = new Category;
            $model->save(['id' => 1, 'name' => 'MISC', 'parent_id' => 0]);
        }

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

        $model = new Category;
        $result = $model->getDataForPaginationAjax($dataRequest,$config);

        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action_list('admin/category', $item->id);
        }

        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();
        die(json_encode($data));
    }

    public function childCategories($item, $id, $type, $result)
    {
        $childCategories = "";
        $childCategories .= "<ul>";
        foreach ($item as $child) {
            if ($child['parent_id'] == $id) {
                $childCategories .= '<li>';
                if ($type == 'list'){
                    $childCategories .= '<a href="category/'.$child['id'].'/edit">';
                    $childCategories .= $child['name'];
                    $childCategories .= '</a>';
                    $childCategories .= $this->childCategories($item, $child['id'], $type, $result);
                }
                else if ($type == 'create'){
                    $childCategories .= '<input type="radio" name="parent_id" id="'.$child["id"].'" value="'.$child["id"].'">';
                    $childCategories .= $child['name'];
                    $childCategories .= $this->childCategories($item, $child['id'], $type, $result);

                }
                else if ($type == 'edit'){
                    if($child['id'] == $result->parent_id){
                        $childCategories .= '<input type="radio" name="parent_id" checked value="'.$child["id"].'" />';
                        $childCategories .= $child['name'];
                        $childCategories .= $this->childCategories($item, $child['id'], $type, $result);
                    }
                    else if($child['id'] == $result->id){
                        $childCategories .= '<input type="radio" name="parent_id" disabled />';
                        $childCategories .= $child['name'];

                    }
                    else {
                        $childCategories .= '<input type="radio" name="parent_id" value="'.$child["id"].'" />';
                        $childCategories .= $child['name'];
                        $childCategories .= $this->childCategories($item, $child['id'], $type, $result);
                    }

                }

                $childCategories .= '</li>';
            }
        }
        $childCategories .= "</ul>";
        return $childCategories;
    }

    public function allCategories($data, $type, $result = ""){
        $allCategories = "";
        foreach ($data as $item) {
            if($item['id'] == 1){
                continue;
            }
            if ($item['parent_id'] == 0) {
                $allCategories .= '<li>';
                if($type == 'list'){
                    $allCategories .= '<a href="category/'.$item['id'].'/edit">';
                    $allCategories .= $item['name'];
                    $allCategories .= '</a>';
                    $allCategories .= $this->childCategories($data, $item['id'], $type, "");
                }
                else if ($type == 'create'){
                    $allCategories .= '<input type="radio" name="parent_id" id="'.$item["id"].'" value="'.$item["id"].'">';
                    $allCategories .= $item['name'];
                    $allCategories .= $this->childCategories($data, $item['id'], $type, "");
                }
                else if ($type == 'edit'){
                    if($item['id'] == $result->parent_id){
                        $allCategories .= '<input type="radio" name="parent_id" id="'.$item["id"].'" checked value="'.$item["id"].'" />';
                        $allCategories .= $item['name'];
                        $allCategories .= $this->childCategories($data, $item['id'], $type, $result);
                    }
                    else if($item['id'] == $result->id){
                        $allCategories .= '<input type="radio" name="parent_id" disabled id="'.$item["id"].'" />';
                        $allCategories .= $item['name'];
                    }
                    else {
                        $allCategories .= '<input type="radio" name="parent_id" id="'.$item["id"].'" value="'.$item["id"].'" />';
                        $allCategories .= $item['name'];
                        $allCategories .= $this->childCategories($data, $item['id'], $type, $result);
                    }
                }

                $allCategories .= "</li>";
            }
        }
        return $allCategories;
    }


    public function index() {
        $categories = Category::all()->toArray();
        $listCategories = array();
        foreach($categories as $value){
            $listCategories[] = $value;
        }

        $allCategoriesInView = $this->allCategories($listCategories, $type='list');

        //dd($allCategoriesInView);
        return view('admin.category.list')->with(['allCategoriesInView' => $allCategoriesInView ]);
    }

    public function create(){
        $categories = Category::all()->toArray();
        $listCategories = array();
        foreach($categories as $value){
            $listCategories[] = $value;
        }

        $allCategoriesInView = $this->allCategories($listCategories, $type='create');


        return view('admin.category.create')->with(['allCategoriesInView' => $allCategoriesInView ]);
    }




    public function store(CategoryRequest $request) {
        $model=new Category();
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('Admin\CategoryController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        $result = Category::find($id);

        $categories = Category::all()->toArray();
        $listCategories = array();
        foreach($categories as $value){
            $listCategories[] = $value;
        }

        $allCategoriesInView = $this->allCategories($listCategories, $type='edit', $result);

        return view('admin.category.edit', compact('result'))->with(['allCategoriesInView' => $allCategoriesInView ]);
    }

    public function update(CategoryRequest $request, $id){

        $data = $request->all();
        $model = Category::find($id);
        autoAssignDataToProperty($model,$request->all());
        if($request->input('parent_id')){
            $model->parent_id = $request->input('parent_id');
        }
        $model->save();
        return redirect()->action('Admin\CategoryController@index')->withSuccess(Lang::get('messages.update_success'));

    }

    public function destroy($id){
        if($id == 1){
            return redirect_success('Admin\CategoryController@index',Lang::get('Can not delete this category'));
        }
        Category::where('parent_id', $id)->update(['parent_id' => 0]);
        Product::where('category_id', $id)->update(['category_id' => 1]);
        Category::find($id)->delete();
        return redirect_success('Admin\CategoryController@index',Lang::get('messages.delete_success'));
    }


    /* -------------------------------------- List All Product Follow Category -------------------------------------- */
    public function childCategoryID($id){
        $categoriesID = Category::where('parent_id', $id)->get();
        if(isset($categoriesID) && $categoriesID != null){
            foreach($categoriesID as $categories){
                $this->allID[] = $categories->id;
                $this->childCategoryID($categories->id);
            }
        }
    }

    public function allCategoryId($id){

        $this->allID[] = $id;
        $categoriesID = Category::where('parent_id', $id)->get();
        if(isset($categoriesID) && $categoriesID != null){
            foreach($categoriesID as $categories){
                $this->allID[] = $categories->id;
                $this->childCategoryID($categories->id);
            }
        }
        $listID = "";
        $listID .= implode(",", $this->allID);

        return $listID;
    }
    public function ProductList($id) {
        $result = Category::find($id);
        $categoryName = $result->name;
        $allID = $this->allCategoryId($id);

        return view('admin.category.product_list')->with(['allID' => $allID, 'categoryName' => $categoryName]);
    }
    public function getProductList(Request $request){
        $dataRequest = $request->all();
        $allID = $request->allID;
        $pageCurrent = $dataRequest['current'];
        $limit = $dataRequest['rowCount'];
        $offset = ($pageCurrent -1)*$limit;

        $config = array(
            'limit'=>$limit,
            'offset'=>$offset,
        );

        $model = new Product();
        $result = $model->getDataForProductList($dataRequest,$config,"category", $allID);


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