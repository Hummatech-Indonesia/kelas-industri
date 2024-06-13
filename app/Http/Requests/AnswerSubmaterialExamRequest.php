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
        return [
            'answer' => 'nullable|array',
            'answer.*' => 'nullable',
            'answer_essay' => 'nullable|array|max:2048',
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
