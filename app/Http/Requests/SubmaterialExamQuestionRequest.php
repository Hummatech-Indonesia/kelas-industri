<?php

namespace App\Http\Requests;

use App\Rules\QuestionTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class SubmaterialExamQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question_bank_id' => 'required|array',
            'question_bank_id.*' => 'exists:question_banks,id',
            'type' => ['required', new QuestionTypeRule],
        ];
    }
}
