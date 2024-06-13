<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerSubmaterialExamRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $dailyExam = $this->route('dailyExam');
        return [
            'answer' => 'nullable|array',
            'answer.*' => 'nullable',
            'answer_essay' => $dailyExam->total_essay != 0 ? 'nullable|array|max:2048' : 'array|max:2048',
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'answer.required' => 'Jawaban wajib di isi',
        ];
    }
}
