<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class transactionDetailRequest extends FormRequest
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
            'nama'=> 'required|string',
            'alamat'=> 'required|max:255',
            'provinsi'=> 'required|string',
            'kota'=> 'required|string',
            'jasa_pengiriman'=> 'required|string|in:TIKI,JNE,J&T,Pos Indonesia',
            'pembayaran'=> 'required|string|in:COD,Kredit,Transfer',
        ];
    }
}
