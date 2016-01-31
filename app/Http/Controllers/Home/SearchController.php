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

class SearchController extends HomeController
{
    /* -------------------------------------------- Search --------------------------------*/
    public function search(Request $request){
        $keyword = $request->search;
        $breadcrumb = "<li>Home</li><li class='active'>Search</li>";
        $products = DB::table('product')->where('name', 'LIKE', '%'.$keyword.'%')->paginate(8);
        $allProductInView = $this->allProducts('search',"", $keyword);
        $products->setPath(URL::to('/search/'.$keyword.''));
        $pagination = $products->render();

        return view('home.index.search')->with(['breadcrumb' => $breadcrumb, 'keyword'=> $keyword, 'allProductInView' => $allProductInView, 'pagination' => $pagination ]);
    }
}
