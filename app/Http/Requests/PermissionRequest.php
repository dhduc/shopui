<?php
//PermissionRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class PermissionRequest extends Request {


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

        ];
    }

    public function attributes()
    {
        return[
            'role_id' => Lang::get('messages.permission_role_id'),
            'routes' => Lang::get('messages.permission_routes'),
            'created_at' => Lang::get('messages.permission_created_at'),
            'updated_at' => Lang::get('messages.permission_updated_at'),

        ];

    }

}