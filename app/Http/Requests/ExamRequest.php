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
            'complexity' => 'required',
            'code_cleanliness' => 'required',
            'design' => 'required',
            'presentation' => 'required',
            'understanding' => 'required',
            'task_level' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'complexity.required' => 'Komplksitas tidak boleh kosong!',
            'code_cleanliness.required' => 'Kerapian Kode baru tidak boleh kosong!',
            'design.required' => 'Desain tidak boleh kosong!',
            'presentation.required' => 'Presentasi tidak boleh kosong!',
            'understanding.required' => 'Pemahaman tidak boleh kosong!',
        ];
    }
}
