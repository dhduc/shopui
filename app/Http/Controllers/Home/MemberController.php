<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;
use App\Category;
use View;
use URL;
use Lang;
use App\Users;


class MemberController extends HomeController
{

    public function __construct(){
        //$this->middleware('auth');
        $title = 'Account Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);

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
            'title' => $title,
            'action_name' => $action_name,
            'data' => $data,
            'cartItem' => $cartItem,
            'allCategoriesInView' => $allCategoriesInView,
            'slider' => $slider
        ));
    }
    public function account($id)
    {
        $result = Users::find($id);

        return view('home.member.account')->with(['result' => $result]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = Users::find($id);
        autoAssignDataToProperty($model,$request->all());

        $password = bcrypt($request->input('password'));
        $model->password = $password;

        $model->save();
        return redirect(URL::previous())->withSuccess(Lang::get('messages.update_success'));
    }



    public function destroy($id)
    {
        //
    }
}
