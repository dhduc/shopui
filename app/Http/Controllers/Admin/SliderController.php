<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\ImagesRequest;
use App\Http\Controllers\Controller;
use Route;
use View;
use Lang;
use Illuminate\Support\Facades\URL;
use App\Images;
use File;

class SliderController extends Controller
{
    public function __construct(){
        $title = 'Slider Management';
        $this->middleware('auth');
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index() {


        $images = Images::where('imageType', "slider")->get();
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
                        <a href="'.URL::to('/').'/admin/slider/del/'.$image['id'].'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    </td>

                </tr>';
        }
        return view('admin.images.slider')->with(['productView' => $productView]);
    }

    public function store(ImagesRequest $request) {


        $images = new Images();
        if($request->hasFile('images'))
        {
            $listImage = array();
            $files = $request->file('images');
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = time() . $name . '.' . $extension;
                $file->move('images/slider', $picture);
                $src = 'images/slider/' . $picture;
                $data = array(
                    'imageName' => $name,
                    'imageSrc' => $src,
                    'imageType' => 'slider'
                );
                autoAssignDataToProperty($images,$data);
                $listImage[] = $data;
            }
            $images->insert($listImage);
        }
        return redirect(URL::previous())->withSuccess(Lang::get('messages.create_success'));
    }


    public function destroy($id){

        $Src = Images::find($id)->imageSrc;
        $imageSrc = URL::to('/').'/'.$Src;
        File::delete($imageSrc);
        Images::find($id)->delete();


        return redirect(URL::previous())->withSuccess(Lang::get('messages.delete_success'));
    }
}
