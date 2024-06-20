<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_classroom_id' => 'required',
            'exam_type' => 'required',
            'semester' => 'required',
            'task_level' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
