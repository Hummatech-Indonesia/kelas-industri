<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'payday' => 'required',
            'salary_amount' => 'required',
            'photo' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }

    /**
     * set custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'payday.required' => 'Tanggal tidak boleh kosong!',
            'salary_amout.required' => 'Jumlah Gaji tidak boleh kosong!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}
