<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPointRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'point' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'point.required' => 'Point Wajib diisi',
            'point.integer' => 'Point harus berformat angka'
        ];
    }
}
