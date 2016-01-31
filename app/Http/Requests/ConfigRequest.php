<?php
//ConfigRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class ConfigRequest extends Request {

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
            'email'=>'required',
            'telephone'=>'required',
            'tax'=>'required',
            'ship'=>'required',
            'created_at'=>'required',
            'updated_at'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'logo' => Lang::get('messages.config_logo'),
            'favicon' => Lang::get('messages.config_favicon'),
            'email' => Lang::get('messages.config_email'),
            'telephone' => Lang::get('messages.config_telephone'),
            'tax' => Lang::get('messages.config_tax'),
            'ship' => Lang::get('messages.config_ship'),
            'created_at' => Lang::get('messages.config_created_at'),
            'updated_at' => Lang::get('messages.config_updated_at'),

        ];

    }

}