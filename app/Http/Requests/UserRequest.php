<?php
//UserRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class UserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'avatar'=>'image|mimes:jpg,jpeg,png,gif|max:500',
            'status'=>'required',
            'role_id'=>'required',
            'created_at'=>'required',
            'updated_at'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'name' => Lang::get('messages.users_name'),
            'password' => Lang::get('messages.users_password'),
            'email' => Lang::get('messages.users_email'),
            'phone' => Lang::get('messages.users_phone'),
            'avatar' => Lang::get('messages.users_avatar'),
            'status' => Lang::get('messages.users_status'),
            'role_id' => Lang::get('messages.users_role_id'),
            'created_at' => Lang::get('messages.users_created_at'),
            'updated_at' => Lang::get('messages.users_updated_at'),

        ];

    }

}

