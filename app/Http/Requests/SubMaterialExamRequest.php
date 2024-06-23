<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubMaterialExamRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:150',
            'sub_material_id' => ['required', Rule::exists('sub_materials', 'id')],
            'total_multiple_choice' => 'required|integer',
            'total_essay' => 'required|integer',
            'multiple_choice_value' => 'required|integer',
            'essay_value' => 'required|integer',
            'start_at' => 'required|date|after_or_equal:now',
            'end_at' => 'required|date|after_or_equal:start_at',
            'time' => 'required|regex:/^[0-9]*$/',
            'last_submit' => 'nullable|boolean',
            'cheating_detector' => 'nullable|boolean',
        ];
    }
}
