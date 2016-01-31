<?php

namespace App\Http\Controllers\Home;

use App\Producer;
use App\Http\Requests;
use App\Category;
use View;
use DB;
use Route;
use Illuminate\Support\Facades\URL;
use App\Images;

class CategoryController extends HomeController
{
    public $allID = array();

    /* -------------------------------------------- Display All Product Follow Category --------------------------------*/

    public function sort($id, $type, $order){
        $categoryName = strtolower(Category::find($id)->name);
        $item0 = $item1 = $item2 = $item3 = $item4 = "";
        if($order == null){
            $item0 = "class='active'";
        }
        else if($type == "name" and $order == "asc"){
            $item1 = "class='active'";
        }
        else if($type == "name" and $order == "desc"){
            $item2 = "class='active'";
        }
        else if($type == "price" and $order == "asc"){
            $item3 = "class='active'";
        }
        else if($type == "price" and $order == "desc"){
            $item4 = "class='active'";
        }
        $sort = '<li '.$item0.'><a href="'.URL::to('/').'/category/'.$id.'/'.$categoryName.'.html">Default</a></li>
                <li '.$item1.'><a href="'.URL::to('/').'/category/'.$id.'/name/asc/'.$categoryName.'.html">Name (A - Z)</a></li>
                <li '.$item2.'><a href="'.URL::to('/').'/category/'.$id.'/name/desc/'.$categoryName.'.html">Name (Z - A)</a></li>
                <li '.$item3.'><a href="'.URL::to('/').'/category/'.$id.'/price/asc/'.$categoryName.'.html">Price (Low &gt; High)</a></li>
                <li '.$item4.'><a href="'.URL::to('/').'/category/'.$id.'/price/desc/'.$categoryName.'.html">Price (High &gt; Low)</a></li>';
        return $sort;
    }

    public function category($id, $type="", $order=""){
        $sort = $this->sort($id, $type, $order);
        $this->allCategoryId($id);
        $categoryName = strtolower(Category::find($id)->name);

        if($type == "name" and $order == "asc"){
            $allProductInView = $this->allProductInCategory($id, "name", "asc");
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("name", "asc")->paginate(9);
            $products->setPath(URL::to('/category/'.$id.'/name/asc/'.$categoryName.'.html'));
        }
        else if($type == "name" and $order == "desc"){
            $allProductInView = $this->allProductInCategory($id, "name", "desc");
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("name", "desc")->paginate(9);
            $products->setPath(URL::to('/category/'.$id.'/name/desc/'.$categoryName.'.html'));
        }
        else if($type == "price" and $order == "asc"){
            $allProductInView = $this->allProductInCategory($id, "price", "asc");
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("price", "asc")->paginate(9);
            $products->setPath(URL::to('/category/'.$id.'/price/asc/'.$categoryName.'.html'));
        }
        else if($type == "price" and $order == "desc"){
            $allProductInView = $this->allProductInCategory($id, "price", "desc");
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("price", "desc")->paginate(9);
            $products->setPath(URL::to('/category/'.$id.'/price/desc/'.$categoryName.'.html'));
        }
        else {
            $allProductInView = $this->allProductInCategory($id, "all", "");
            $products = DB::table('product')->whereIn('category_id', $this->allID)->paginate(9);
            $products->setPath(URL::to('/category/'.$id.'/'.$categoryName.'.html'));
        }

        $pagination = $products->render();

        // breadcrumb
        $breadcrumb = $this->breadcrumb($id);

        // Best Seller
        $bestSeller = $this->bestSeller();

        return view('home.index.category')->with(['breadcrumb' => $breadcrumb,'bestSeller' => $bestSeller, 'sort' => $sort, 'allProductInView' => $allProductInView, 'pagination' => $pagination ]);
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

    }

    public function childCategoryID($id){
        $categoriesID = Category::where('parent_id', $id)->get();
        if(isset($categoriesID) && $categoriesID != null){
            foreach($categoriesID as $categories){
                $this->allID[] = $categories->id;
                $this->childCategoryID($categories->id);
            }
        }
    }

    public function allProductInCategory($id=0, $type="", $order=""){
        $this->allCategoryId($id);
        if($type == "all" and $order == ""){
            $products = DB::table('product')->whereIn('category_id', $this->allID)->paginate(9)->toArray();
        }
        else if($type == "name" and $order == "asc"){
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("name", "asc")->paginate(9)->toArray();
        }
        else if($type == "name" and $order == "desc"){
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("name", "desc")->paginate(9)->toArray();
        }
        else if($type == "price" and $order == "asc"){
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("price", "asc")->paginate(9)->toArray();
        }
        else if($type == "price" and $order == "desc"){
            $products = DB::table('product')->whereIn('category_id', $this->allID)->orderBy("price", "desc")->paginate(9)->toArray();
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
            $allProductInView .= '<div class="col-md-4 col-sm-6 col-xs-12">';
            $allProductInView .= '<div class="thumbnail">';
            $allProductInView .= '<a class="preview" rel="'.URL::to('/').'/'.$thumbnail.'" href="'.URL::to('/product').'/'.$item->id.'/'.$item->name.'.html" class="post-image-link">';
            $allProductInView .= '<p><img src="'.URL::to('/').'/'.$thumbnail.'" class="img-responsive" alt="'.strtolower($item->name).'"></p>';
            $allProductInView .= '</a>';
            $allProductInView .= '<div class="caption">';
            $allProductInView .= '<h3><a href="'.URL::to('/product').'/'.$item->id.'/'.strtolower($item->name).'.html">'.$item->name.'</a></h3>';
            $allProductInView .= substr($description, 0, 70).'<br>';
            $allProductInView .= '<span class="btn btn-default"><i class="fa fa-cart"></i>'.$item->price.'$</span>';
            $allProductInView .= '<a href="'.URL::to('/').'/producer/'.$item->producer.'" class="btn btn-primary">'.$producerName.'</a>';
            $allProductInView .= '</div>';
            $allProductInView .= ' </div></div>';
        }
        return $allProductInView;
    }









}
