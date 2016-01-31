<?php

namespace App\Http\Controllers\Home;

use App\Configs;
use App\Product;
use App\Producer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Session;
use View;
use DB;
use Route;
use Illuminate\Support\Facades\URL;
use App\Images;

class HomeController extends Controller
{
    public $total;
    public $allItemBreadcrumb = array();
    public $action_name;

    public function __construct(){

        // Info
        $config = Configs::all()->first();
        $class_name = substr(__CLASS__,21);
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
        $slider = $this->slider();

        // Display
        View::share(array(
            'config' => $config,
            'action_name' => $this->action_name,
            'data' => $data,
            'cartItem' => $cartItem,
            'allCategoriesInView' => $allCategoriesInView,
            'slider' => $slider
        ));
    }

    /* -------------------------------------------- Display Category ------------------------------------------------*/
    public function childCategories($item, $id){
        $childCategories = "";
        $childCategories .= "<ul class='dropdown-menu'>";
        foreach ($item as $child) {
            if ($child["parent_id"] == $id) {
                $childCategories .= "<li class='dropdown-submenu'>";                            ;
                $childCategories .= "<a href='".URL::to('/')."/category/".$child["id"]."/".strtolower($child['name']).".html'>";
                $childCategories .= $child["name"];
                if($this->childCategories($item, $child["id"]) != "<ul class='dropdown-menu'></ul>"){
                    $childCategories .= "<i class='fa fa-angle-right'></i>";
                }
                $childCategories .= "</a>";
                $childCategories .= $this->childCategories($item, $child["id"]);
                $childCategories .= "</li>";
            }
            else {
                $childCategories .= "";
            }
        }
        $childCategories .= "</ul>";
        return $childCategories;
    }

    public function  allCategories(){
        $categories = Category::all()->toArray();
        $listCategories = array();
        foreach($categories as $value){
            $listCategories[] = $value;
        }
        $allCategories = "";
        foreach ($listCategories as $item) {
            if($item['id'] == 1) continue;
            if ($item["parent_id"] == 0) {

                if($this->childCategories($listCategories, $item["id"]) == "<ul class='dropdown-menu'></ul>"){
                    $allCategories .= "<li>";
                    $allCategories .= "<a href='".URL::to('/')."/category/".$item["id"]."/".strtolower($item['name']).".html'>";
                }
                else {
                    $allCategories .= "<li class='dropdown'>";
                    $allCategories .= "<a class='dropdown-toggle' data-toggle='dropdown'
                    data-target='".URL::to('/')."/category/".$item["id"]."'
                    href='".URL::to('/')."/category/".$item["id"]."/".strtolower($item['name']).".html'>";
                }
                $allCategories .= $item["name"];
                $allCategories .= "</a>";
                $allCategories .= $this->childCategories($listCategories, $item["id"]);
                $allCategories .= "</li>";
            }
        }
        return $allCategories;
    }


    /* -------------------------------------------- Display Slider ------------------------------------------------*/
    public function slider(){

        $images = Images::where('imageType', "slider")->get();
        $productView = "";
        foreach($images as $image){
            $productView .= '<div class="ls-slide ls-slide1" data-ls="offsetxin: right; slidedelay: 7000; transition2d: 24,25,27,28;">
                <img src="'.URL::to('/').'/'.$image['imageSrc'].'" class="ls-bg" alt="Slide background">
            </div>';
        }
        return $productView;
    }

    /* -------------------------------------------- Display Breadcrumb ------------------------------------------------*/
    public function categoryParentItem($id){
        // current item
        $category = Category::find($id);

        if(isset($category) && $category != null){
            $categoryName = $category->name;
            $item = "<li>";
            $item .= '<a href="'.URL::to('/').'/category/'.$category->id.'/'.strtolower($category->name).'.html">'.$categoryName.'</a>';
            $item .= "</li>";
            $this->allItemBreadcrumb[] = $item;

            // parent item
            $parentID = Category::find($id)->parent_id;
            $this->categoryParentItem($parentID);
        }
    }

    public function categoryItem($id, $productID=""){
        // product name
        if(isset($productID) && $productID != null){
            $productName = Product::find($productID)->name;
            $currentItem = "<li class='active'>";
            $currentItem .= $productName;
            $currentItem .= "</li>";
            $this->allItemBreadcrumb[] = $currentItem;
            // category current
            $category = Category::find($id);
            $categoryName = $category->name;
            $item = "<li>";
            $item .= '<a href="'.URL::to('/').'/category/'.$id.'/'.strtolower($category->name).'.html">'.$categoryName.'</a>';
            $item .= "</li>";
            $this->allItemBreadcrumb[] = $item;
        }
        else {
            // current item
            $categoryName = Category::find($id)->name;
            $currentItem = "<li class='active'>";
            $currentItem .= $categoryName;
            $currentItem .= "</li>";
            $this->allItemBreadcrumb[] = $currentItem;
        }

        // parent item
        $parentID = Category::find($id)->parent_id;
        $this->categoryParentItem($parentID);
    }
    public function producerItem($id, $productID=""){
        // product name
        if(isset($productID) && $productID != null){
            $productName = Product::find($productID)->name;
            $currentItem = "<li class='active'>";
            $currentItem .= $productName;
            $currentItem .= "</li>";
            $this->allItemBreadcrumb[] = $currentItem;
            // category current
            $producer = Producer::find($id)->producer;
            $producerName = $producer->producer;
            $item = "<li>";
            $item .= '<a href="'.URL::to('/').'/producer/'.$id.'/'.strtolower($producer->producer).'.html">'.$producerName.'</a>';
            $item .= "</li>";
            $this->allItemBreadcrumb[] = $item;
        }
        else {
            // current item
            $producerName = Producer::find($id)->producer;
            $currentItem = "<li class='active'>";
            $currentItem .= $producerName;
            $currentItem .= "</li>";
            $this->allItemBreadcrumb[] = $currentItem;
        }


    }
    public function breadcrumb($id, $productID = ""){
        if($this->action_name == "category"){
            $this->categoryItem($id, $productID);
        }
        else if($this->action_name == "producer"){
            $this->producerItem($id, $productID);
        }
        else if($this->action_name == "product"){
            $this->categoryItem($id, $productID);
        }

        $homeItem = "<li><a href='".URL::to('/')."'>Home</a></li>";
        $this->allItemBreadcrumb[] = $homeItem;
        krsort($this->allItemBreadcrumb);
        $breadcrumb = implode("", $this->allItemBreadcrumb);
        return $breadcrumb;
    }

    /* -------------------------------------------- Display Best Seller ------------------------------------------------*/
    public function bestSeller(){
        $allProduct = "";
        $model = new Product;
        $result = $model->bestSeller();
        $listProduct = array();
        foreach ($result['rows'] as $item) {
            $listProduct[] = $item;
        }
        foreach($listProduct as $product){
            $images = Images::where('productID', $product['id'])->first();
            $thumbnail = $images['imageSrc'];

            $allProduct .= '<div class="item">';
            $allProduct .= '<a href="'.URL::to('/product').'/'.$product['id'].'/'.strtolower($item->name).'.html">';
            $allProduct .= '<img src="'.URL::to('/').'/'.$thumbnail.'"
                    alt="'.$product['name'].'"></a>';
            $allProduct .= '<h3><a href="'.URL::to('/product').'/'.$product['id'].'/'.strtolower($item->name).'.html">'.$product['name'].'</a></h3>';
            $allProduct .= '<div class="price">$'.$product['price'].'</div>';
            $allProduct .= '</div>';
        }
        return $allProduct;

    }

    /* -------------------------------------------- Display All Product ------------------------------------------------*/
    public function index()
    {
        $newProductInView = $this->allProducts("new");
        $bestSellerProduct = $this->allProducts("best_seller");
        $brands = $this->brands();
        return view('home.index.home')->with(['newProductInView' => $newProductInView, 'bestSellerProduct' => $bestSellerProduct, 'brands' => $brands]);
    }
    public function allProducts($type="", $id=0, $search=""){


        if($type == "new"){
            $products = DB::table('product')->orderBy('id', 'desc')->paginate(4)->toArray();
        }
        else if($type == "best_seller"){
            $products = DB::table('product')->orderBy('purchase', 'desc')->paginate(4)->toArray();
        }
        else if($type == 'search'){
            $products = DB::table('product')->where('name', 'LIKE', '%'.$search.'%')->paginate(8)->toArray();
        }

        $allProduct = array();
        foreach($products['data'] as $product){
            $allProduct[] = $product;
        }
        $allProductInView = "";
        foreach($allProduct as $item){

            $description = $item->description;
            $producerName = Producer::find($item->producer)->producer;
            $images = Images::where('productID', $item->id)->first();
            $thumbnail = $images['imageSrc'];
            $allProductInView .= '<div class="col-lg-3 col-sm-6">';
            $allProductInView .= '<div class="thumbnail">';
            $allProductInView .= '<a class="preview" rel="'.URL::to('/').'/'.$thumbnail.'" href="'.URL::to('/product').'/'.$item->id.'/'.$item->name.'.html" class="post-image-link">';
            $allProductInView .= '<p><img src="'.URL::to('/').'/'.$thumbnail.'" class="img-responsive" alt="'.strtolower($item->name).'"></p>';
            $allProductInView .= '</a>';
            $allProductInView .= '<div class="caption">';
            $allProductInView .= '<h3><a href="'.URL::to('/product').'/'.$item->id.'/'.strtolower($item->name).'.html">'.$item->name.'</a></h3>';
            $allProductInView .= substr($description, 0, 70).'<br>';
            $allProductInView .= '<span class="btn btn-default"><i class="fa fa-cart"></i>'.$item->price.'$</span>';
            $allProductInView .= '<a href="'.URL::to('/').'/producer/'.$item->producer.'/'.strtolower($producerName).'.html" class="btn btn-primary">'.$producerName.'</a>';
            $allProductInView .= '</div>';
            $allProductInView .= ' </div></div>';
        }
        return $allProductInView;
    }

    public function brands(){
        $producers = Producer::all()->toArray();
        $brands = "";
        foreach($producers as $index => $item){
            $brands .= ' <div class="owl-item active" style="width: 163px;"><a href="'.URL::to('/').'/producer/'.$item['id'].'/'.strtolower($item['producer']).'.html"><img
                                    src="'.$item['logo'].'" alt="'.$item['producer'].'"
                                    title="'.$item['producer'].'"></a>
                    </div>';

        }
        return $brands;
    }

    /* -------------------------------------------- Show Cart Item --------------------------------*/
    public function allCart(){
        $cartItem = "";
        if(Session::has('product')){
            $items = Session::get('product');
            $numberItem = count($items);
            if($numberItem > 0){
                $cartItem = '<div class="top-cart-info">
                <a href="'.URL::to('/').'/cart/view" class="top-cart-info-count">'.$numberItem.' items</a></div>';
            }

        }
        return $cartItem;
    }
}
