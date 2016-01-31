<?php
//ImagesRequest.php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class ImagesRequest extends Request {

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

        ];
    }

    public function attributes()
    {
        return[
            'productID' => Lang::get('messages.images_productID'),
            'imageName' => Lang::get('messages.images_imageName'),
            'imageSrc' => Lang::get('messages.images_imageSrc'),

        ];

    }

}