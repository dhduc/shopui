<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class DemoController extends Controller
{

    public function index()
    {
        return view('pages.demo');
    }
    public function page($id){
        foreach(range(0, 100) as $num){
            $arg[] = $num;
        }
        $total = count($arg);
        $limit = 10;
        $pages = ceil($total/$limit);
        $start = ($id-1)*$limit;
        $res = array_slice($arg, $start, $limit);
        $pagi = "";
        $pagi .= "<a href=''></a>";
        if($pages <=1 ){
            $pagi = "";
        }
        else {
            for($i =1; $i<=$pages; $i++) {
                if($i == $id){
                    $pagi .= "$id | ";
                }
                else {
                    $url = "";
                    $pagi .= '<a href="$url"></a>';
                }
            }
        }
        return view('pages.demo')->with(['res' => $res, 'pagi' => $pagi]);

    }


    public function getImageUpload(){
        return view('demo.image_upload');
    }
    public function postImageUpload(Request $request){
//        $j = 0;
//        $target_path = "uploads/";
//        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
//            $ext = explode('.', basename($_FILES['file']['name'][$i]));
//            $file_extension = end($ext);
//            $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
//            $j = $j + 1;
//            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);
//        }
        $images = new Picture();
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
                $product_id = 1;
                $data = array(
                    'productID' => $product_id,
                    'imageName' => $name,
                    'imageSrc' => $src
                );
                autoAssignDataToProperty($images,$data);
                $listImage[] = $data;
            }
            $images->insert($listImage);
            return redirect(URL::to('/demo/image_upload'))->withSuccess('Image Upload');
        }
        else{

        }

    }

    public function thumbnail(){
        $products = Product::all()->toArray();
        $allProduct = array();
        foreach($products['data'] as $product){
            $allProduct[] = $product;
        }
        foreach($allProduct as $item){
            $images = Images::where('productID', $item->id)->first();
            $thumbnail = $images['imageSrc'];
            $model = new Product;
            $model->thumbnail = $thumbnail;
            $model->save();
        }
    }
}
