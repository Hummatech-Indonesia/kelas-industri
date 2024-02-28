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
            'salary_amount.*' => 'required',
            'photo.*' => 'required|mimes:png,jpg,jpeg|max:2048',
            'generation_id' => 'nullable',
        ];
    }

    /**
     * set custom messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'salary_amount.*.required' => 'salary amount :index ini harus diisi!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}
