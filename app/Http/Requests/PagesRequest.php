<?php
//PagesRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class PagesRequest extends Request {

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
            'title'=>'required',
            'content'=>'required',
        ];
    }

    public function attributes()
    {
        return[
            'title' => Lang::get('messages.pages_title'),
            'content' => Lang::get('messages.pages_content'),
            'created_at' => Lang::get('messages.pages_created_at'),
            'updated_at' => Lang::get('messages.pages_updated_at'),

        ];

    }

}