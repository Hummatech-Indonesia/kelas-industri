<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubMaterialExamUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'total_multiple_choice' => 'required|integer',
            'total_essay' => 'required|integer',
            'multiple_choice_value' => 'required|integer',
            'essay_value' => 'required|integer',
            'time' => 'required|regex:/^[0-9]*$/',
            'last_submit' => 'nullable|boolean',
            'cheating_detector' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'total_multiple_choice.required' => 'Total soal pilihan ganda diperlukan.',
            'total_multiple_choice.integer' => 'Total soal pilihan ganda harus berupa angka.',
            'total_essay.required' => 'Total soal esai diperlukan.',
            'total_essay.integer' => 'Total soal esai harus berupa angka.',
            'multiple_choice_value.required' => 'Nilai untuk soal pilihan ganda diperlukan.',
            'multiple_choice_value.integer' => 'Nilai untuk soal pilihan ganda harus berupa angka.',
            'essay_value.required' => 'Nilai untuk soal esai diperlukan.',
            'essay_value.integer' => 'Nilai untuk soal esai harus berupa angka.',
            'time.required' => 'Waktu pengerjaan diperlukan.',
            'time.regex' => 'Waktu pengerjaan harus berupa angka.',
            'last_submit.boolean' => 'Status pengiriman terakhir harus berupa benar atau salah.',
            'cheating_detector.boolean' => 'Detektor kecurangan harus berupa benar atau salah.',
        ];
    }
}
