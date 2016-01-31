<?php
//ProductRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class ProductRequest extends Request {


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required',
            'category_id'=>'required',
            'seller_id'=>'required',
            'cost'=>'required',
            'price'=>'required',
            'producer'=>'required',
            'description'=>'required',
            'information'=>'required',
            'number'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'name' => Lang::get('messages.product_name'),
            'category_id' => Lang::get('messages.product_category_id'),
            'seller_id' => Lang::get('messages.product_seller_id'),
            'cost' => Lang::get('messages.product_cost'),
            'price' => Lang::get('messages.product_price'),
            'producer' => Lang::get('messages.product_producer'),
            'description' => Lang::get('messages.product_description'),
            'information' => Lang::get('messages.product_information'),
            'number' => Lang::get('messages.product_number'),
            'purchase' => Lang::get('messages.product_purchase'),
            'status' => Lang::get('messages.product_status'),
            'created_at' => Lang::get('messages.product_created_at'),
            'updated_at' => Lang::get('messages.product_updated_at'),



        ];

    }

}