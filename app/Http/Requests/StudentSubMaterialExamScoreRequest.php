<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentSubMaterialExamScoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_submaterial_exam_answer_id' => 'required|array',
            'student_submaterial_exam_answer_id.*' => 'required|exists:student_submaterial_exam_answers,id',
            'answer_value' => 'required|array',
            'answer_value.*' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'student_submaterial_exam_answer_id.required' => 'Pilih minimal satu siswa yang ingin anda nilai',
            'student_submaterial_exam_answer_id.*.exists' => 'id yang anda pilih tidak sesuai',
            'answer_value.array' => 'Nilai harus bertipe array',
            'answer_value.required' => 'Nilai wajib diisi',
        ];
    }
}
