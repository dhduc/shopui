<?php

namespace App\Http\Controllers\Auth;

use App;
use App\User;
use App\Configs;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;
    protected $redirectPath = '/admin/dashboard';
    protected $loginPath = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        // Info
        $config = Configs::all()->first();
        View::share(array(
            'config' => $config
        ));
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    protected function create(array $data)
    {

        $key =  str_random(60).$data['email'];

        Mail::send('emails.email_confirm',
            array(
                'name' => $data['name'],
                'email' => $data['email'],
                'key' => $key,
            ), function($message)
            {
                $message->from('huuduc.uneti@gmail.com');
                $message->to(Input::get('email'), 'Admin')->subject('Email Account Confirmation');
            });


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'keyactive' => $key,
            'status' => 0,
        ]);
    }


    public function confirm($key){

        $user = App\User::where('keyactive', $key)
                ->update(['status' => 1]);
        return redirect()->action('Auth\AuthController@getLogin')->withSuccess("Account activated, please login");
    }

}
