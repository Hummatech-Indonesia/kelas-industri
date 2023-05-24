<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'title' => 'required'
        ];
    }

    /**
     * custom messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul Tidak Boleh Kosong!'
        ];
    }
}
