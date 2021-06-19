<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemDetailsRequest extends FormRequest
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
            'category'=>'required|string|in:OTOMOTIF,CLOTHES,GAME,SHOES',
            'item_name'=> 'required|max:255',
            'QTY'=> 'required|integer',
            'harga'=> 'required|integer',
            'diskon'=> 'required|integer',
            'description' => 'required'

        ];
    }
}
