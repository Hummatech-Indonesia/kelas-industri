<?php

namespace App\Http\Requests;

use FontLib\Table\Type\name;
use Illuminate\Foundation\Http\FormRequest;

class DevisionRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama harus diisi',
        ];
    }
}
