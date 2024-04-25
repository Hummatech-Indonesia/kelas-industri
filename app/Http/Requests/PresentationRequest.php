<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresentationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date|after_or_equal:now',
            'project_id' => 'required',
            'presentation_status' => 'required',
        ];
    }
}
