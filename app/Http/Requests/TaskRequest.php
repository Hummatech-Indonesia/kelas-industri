<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'project_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required|date|after_or_equal:today',
            'priority' => 'required',
            'status' => 'nullable',
        ];
    }
}
