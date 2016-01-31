<?php
//RoleRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class RoleRequest extends Request {


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'role'=>'required|unique:role,role,'. $this->get('id'),
            'role_name'=>'required|unique:role,role_name,'. $this->get('id')
        ];
    }

    public function attributes()
    {
        return[
            'role' => Lang::get('messages.role_role'),
            'role_name' => Lang::get('messages.role_role_name'),
            'created_at' => Lang::get('messages.role_created_at'),
            'updated_at' => Lang::get('messages.role_updated_at'),

        ];

    }

}