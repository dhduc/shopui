<?php
//ProducerRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class ProducerRequest extends Request {


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'producer'=>'required',
            'information'=>'required',
            'logo'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'producer' => Lang::get('messages.producer_producer'),
            'information' => Lang::get('messages.producer_information'),


        ];

    }

}