<?php
//CategoryRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class CategoryRequest extends Request {


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required',
            'parent_id'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'name' => Lang::get('messages.category_name'),
            'parent_id' => Lang::get('messages.category_parent_id'),


        ];

    }

}