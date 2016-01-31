<?php
//OrderRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class OrderRequest extends Request {


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
            'userID' => Lang::get('messages.order_userID'),
            'customerID' => Lang::get('messages.order_customerID'),
            'datetime' => Lang::get('messages.order_datetime'),
            'total' => Lang::get('messages.order_total'),
            'note' => Lang::get('messages.order_note'),
            'status' => Lang::get('messages.order_status'),
            'created_at' => Lang::get('messages.order_created_at'),
            'updated_at' => Lang::get('messages.order_updated_at'),

        ];

    }

}