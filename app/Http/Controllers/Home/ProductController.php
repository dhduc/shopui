<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\HomeController;
use App\Product;
use App\Producer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Session;
use View;
use DB;
use Route;
use Illuminate\Support\Facades\URL;
use App\Images;

class ProductController extends HomeController
{

    /* -------------------------------------------- Display Product Detail --------------------------------*/
    public function product($id)
    {
        // Product Detail
        $product = Product::find($id);
        $producer = Producer::find($product->producer);
        $producerItem = "<a href='".URL::to('/')."/producer/".$producer->id."/".strtolower($producer->producer).".html'>".$producer->producer."</a>";

        // Category
        $productCategoryID = Product::find($id)->category_id;

        // breadcrumb
        $breadcrumb = $this->breadcrumb($productCategoryID, $id);

        // Best Seller
        $bestSeller = $this->bestSeller();


        $image = Images::where('productID', $product['id'])->first();
        $thumbnail = $image['imageSrc'];
        $thumbnailImage = '<a class="preView" rel="'.URL::to('/').'/'.$thumbnail.'"><img src="'.URL::to('/').'/'.$thumbnail.'" alt="" class="img-responsive"></a>';


        $images = Images::where('productID', $id)->get();
        $listImages = "";
        foreach($images as $image){
            $img = $image['imageSrc'];
            $listImages .= '<a href="'.URL::to('/').'/'.$img.'" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="'.URL::to('/').'/'.$img.'"></a>';
        }

        $review = '<div class="fb-comments" data-href="'.URL::to('/').'/product/'.$id.'"
                data-num-posts="10" data-width="700px"></div>';


        return view('home.product.detail')->with(['breadcrumb' => $breadcrumb, 'product' => $product,
            'producer' => $producerItem,'bestSeller' => $bestSeller,
            'thumbnailImage' => $thumbnailImage, 'listImages' => $listImages, 'review' => $review]);
    }
}
