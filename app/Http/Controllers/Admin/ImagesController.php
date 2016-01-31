<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesRequest;
use App\Product;
use App\Images;
use Lang;
use View;
use Route;
use Illuminate\Support\Facades\URL;
use DB;
use File;


class ImagesController extends Controller {


    public function __construct(){
        $title = 'Images Management';
        $this->middleware('auth');
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index($key) {
        $productID = $key;
        $productName = Product::find($key)->name;
        $images = Images::where('productID', $key)->get();

        $productView = "";
        foreach($images as $image){
            $productView .= '<tr><td>
                        '.$image['id'].'
                    </td>
                    <td>
                        <img src="'.URL::to('/').'/'.$image['imageSrc'].'" width="100px" height="100px" />
                    </td>
                    <td>
                        '.$image['imageName'].'
                    </td>
                    <td>
                        <a href="'.URL::to('/').'/admin/images/del/'.$image['id'].'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    </td>

                </tr>';
        }
        return view('admin.images.list')->with(['productID' => $productID, 'productName' => $productName, 'productView' => $productView]);
    }

    public function store(ImagesRequest $request) {
        $product_id = $request->productID;
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
        return redirect(URL::previous())->withSuccess(Lang::get('messages.create_success'));
    }


    public function destroy($id){
        DB::transaction(function () use($id) {});
            $imageSrc = Images::find($id)->imageSrc;
            unlink($imageSrc);
            Images::find($id)->delete();
        DB::commit();

        return redirect(URL::previous())->withSuccess(Lang::get('messages.delete_success'));
    }

}