<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StandartOperationProcuderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sop' => 'required',
            'for_user' => ['required', Rule::unique('standart_operation_procedures', 'for_user')->ignore($this->standart_operation_producer)],
        ];
    }

    public function messages()
    {
        return [
            'sop.required' => 'SOP wajib diisi',
            'for_user.required' => 'Tentukan untuk role apa SOP tersebut',
            'for_user.unique' => 'SOP untuk role yang anda pilih sudah terpilih'
        ];
    }
}
