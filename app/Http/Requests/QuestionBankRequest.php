<?php

namespace App\Http\Requests;

use App\Rules\AnswerQuestionRule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionBankRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'sub_material_id' => 'required|exists:sub_materials,id',
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'option5' => 'required',
            'answer' => 'required|array',
            'answer.*' => ['required', new AnswerQuestionRule],
        ];
    }

    public function messages(): array
    {
        return [
            'sub_material_id.required' => 'Kolom submaterial harus diisi.',
            'sub_material_id.exists' => 'Nilai yang dipilih untuk submaterial tidak valid.',
            'question.required' => 'Kolom pertanyaan harus diisi.',
            'option1.required' => 'Kolom opsi 1 harus diisi.',
            'option2.required' => 'Kolom opsi 2 harus diisi.',
            'option3.required' => 'Kolom opsi 3 harus diisi.',
            'option4.required' => 'Kolom opsi 4 harus diisi.',
            'option5.required' => 'Kolom opsi 5 harus diisi.',
            'answer.required' => 'Kunci jawaban harus diisi.',
            'answer.array' => 'Kunci jawaban harus dalam bentuk array.',
            'answer.*.required' => 'Setiap jawaban harus diisi.',
        ];
    }
}
