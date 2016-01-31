<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\HomeController;
use Illuminate\Http\Request;

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

class ProducerController extends HomeController
{

    /* -------------------------------------------- Display All Product Follow Producer --------------------------------*/
    public function sort($id, $type, $order){
        $producerName = strtolower(Producer::find($id)->producer);
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
        $sort = '<li '.$item0.'><a href="'.URL::to('/').'/producer/'.$id.'/'.$producerName.'.html">Default</a></li>
                <li '.$item1.'><a href="'.URL::to('/').'/producer/'.$id.'/name/asc/'.$producerName.'.html">Name (A - Z)</a></li>
                <li '.$item2.'><a href="'.URL::to('/').'/producer/'.$id.'/name/desc/'.$producerName.'.html">Name (Z - A)</a></li>
                <li '.$item3.'><a href="'.URL::to('/').'/producer/'.$id.'/price/asc/'.$producerName.'.html">Price (Low &gt; High)</a></li>
                <li '.$item4.'><a href="'.URL::to('/').'/producer/'.$id.'/price/desc/'.$producerName.'.html">Price (High &gt; Low)</a></li>';
        return $sort;
    }
    public function producer($id, $type="", $order=""){
        $sort = $this->sort($id, $type, $order);
        $producerName = strtolower(Producer::find($id)->producer);

        if($type == "name" and $order == "asc"){
            $allProductInView = $this->allProductInProducer($id, "name", "asc");
            $products = DB::table('product')->where('producer', $id)->orderBy("name", "asc")->paginate(9);
            $products->setPath(URL::to('/producer/'.$id.'/name/asc/'.$producerName.'.html'));
        }
        else if($type == "name" and $order == "desc"){
            $allProductInView = $this->allProductInProducer($id, "name", "desc");
            $products = DB::table('product')->where('producer', $id)->orderBy("name", "desc")->paginate(9);
            $products->setPath(URL::to('/producer/'.$id.'/name/desc/'.$producerName.'.html'));
        }
        else if($type == "price" and $order == "asc"){
            $allProductInView = $this->allProductInProducer($id, "price", "asc");
            $products = DB::table('product')->where('producer', $id)->orderBy("price", "asc")->paginate(9);
            $products->setPath(URL::to('/producer/'.$id.'/price/asc/'.$producerName.'.html'));
        }
        else if($type == "price" and $order == "desc"){
            $allProductInView = $this->allProductInProducer($id, "price", "desc");
            $products = DB::table('product')->where('producer', $id)->orderBy("price", "desc")->paginate(9);
            $products->setPath(URL::to('/producer/'.$id.'/price/desc/'.$producerName.'.html'));
        }
        else {
            $allProductInView = $this->allProductInProducer($id, "all", "");
            $products = DB::table('product')->where('producer', $id)->paginate(9);
            $products->setPath(URL::to('/producer/'.$id.'/'.$producerName.'.html'));
        }


        // Pagination
        $pagination = $products->render();
        // breadcrumb
        $breadcrumb = $this->breadcrumb($id);
        // Best Seller
        $bestSeller = $this->bestSeller();

        return view('home.index.producer')->with(['breadcrumb' => $breadcrumb, 'bestSeller' => $bestSeller, 'sort' => $sort, 'allProductInView' => $allProductInView, 'pagination' => $pagination ]);
    }

    public function allProductInProducer($id=0, $type="", $order=""){
        if($type == "all" and $order == ""){
            $products = DB::table('product')->where('producer', $id)->paginate(9)->toArray();
        }
        else if($type == "name" and $order == "asc"){
            $products = DB::table('product')->where('producer', $id)->orderBy("name", "asc")->paginate(9)->toArray();
        }
        else if($type == "name" and $order == "desc"){
            $products = DB::table('product')->where('producer', $id)->orderBy("name", "desc")->paginate(9)->toArray();
        }
        else if($type == "price" and $order == "asc"){
            $products = DB::table('product')->where('producer', $id)->orderBy("price", "asc")->paginate(9)->toArray();
        }
        else if($type == "price" and $order == "desc"){
            $products = DB::table('product')->where('producer', $id)->orderBy("price", "desc")->paginate(9)->toArray();
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
