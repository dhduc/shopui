<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use Illuminate\Http\Request;
use App\Configs;
use Lang;
use View;
use Route;


class ConfigController extends Controller {


    public function __construct(){
        $this->middleware('auth');
        $title = 'Website Config';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index() {
        $result = Configs::all()->toArray();
        return view('admin.config.index')->with(['result' => $result[0]]);
    }


    public function update(ConfigRequest $request){

        $model = new Configs;

        // Logo
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = time().$name .'.'.$extension;
            $request->file('logo')->move(
                'images/img', $picture
            );
            $logo = 'images/img/'.$picture;
        }
        else{
            $config = Configs::all()->first();
            $logo = $config['logo'];
        }

        // Favicon
        if($request->hasFile('favicon'))
        {
            $file = $request->file('favicon');
            $name = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = time().$name .'.'.$extension;
            $request->file('favicon')->move(
                'images/img', $picture
            );
            $favicon = 'images/img/'.$picture;
        }
        else{
            $config = Configs::all()->first();
            $favicon = $config['favicon'];
        }

        $data = array(
            'logo' => $logo,
            'favicon' => $favicon,
            'title' => $request->title,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'tax' => $request->tax,
            'ship' => $request->ship,
        );

        $model->update($data);
        return redirect()->action('Admin\ConfigController@index')->withSuccess(Lang::get('messages.update_success'));

    }


}