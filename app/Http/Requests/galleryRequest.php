<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class galleryRequest extends FormRequest
{
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
            'item_id'=> 'required|integer|exists:item_details,id',
            'photo_orders'=> 'required|integer|max:4',
            'image' => 'required|image'
        ];
    }
}
