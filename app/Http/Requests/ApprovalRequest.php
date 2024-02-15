<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApprovalRequest extends FormRequest
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
            'status' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            // 'status.required' => 'Status harus diisi',
        ];
    }
}
