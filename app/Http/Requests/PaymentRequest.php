<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'user_id' => 'required',
            'total_pay' => 'required',
            'payment_date' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            //
            'user_id.required' => 'user harus diisi',
            'total_pay.required' => 'nominal harus disi',
            'payment_date.required' => 'tanggal pembayaran harus diisi',
        ];
    }
}
