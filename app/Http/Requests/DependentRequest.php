<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'semester' => 'required',
            'classroom_id' => [
                'nullable',
                Rule::unique('dependents')->where(function ($query) {
                    return $query->where('semester', $this->semester);
                }),
            ],
            'nominal' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'semester.required' => 'Semester wajib diisi',
            'classroom_id.unique' => 'Semester yang anda  masukkan sudah ada pada kelas yang anda pilih',
            'nominal.required' => 'Nominal wajib diisi',
            'nominal.numeric' => 'Nominal harus diisi angka',
            'nominal.min' => 'Nilai nominal tidak boleh negatif.',
        ];
    }
}
