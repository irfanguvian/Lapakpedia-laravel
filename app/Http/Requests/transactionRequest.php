<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class transactionRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'username'=> 'required|max:255',
            'items'=> 'required|integer',
            'transaction_total'=> 'required|integer',
            'transaction_status'=> 'required|string|in:Pending,Success,Failed',
            
        ];
    }
}
