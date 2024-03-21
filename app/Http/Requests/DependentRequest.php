<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependentRequest extends FormRequest
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
            'semester' => 'required',
            'classroom_id' => 'required',
            'nominal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
            'semester.required' => 'Semester wajib diisi',
            'classroom_id.required' => 'Kelas wajib diisi',
            'nominal.required' => 'Nominal wajib diisi',
        ];
    }
}
