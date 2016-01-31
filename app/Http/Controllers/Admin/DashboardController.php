<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Support\Facades\Auth;
use Route;
use View;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $title = 'Admin Dashboard';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));
    }

    public function index()
    {
        $username = Auth::user()->name;
        $data = array(
            'users' => App\Users::count(),
            'products' => App\Product::count(),
            'orders' => App\Order::count(),
            'producers' => App\Producer::count(),
        );
        return view('admin.dashboard.index', compact('data'))->with(['username' => $username]);
    }

}
