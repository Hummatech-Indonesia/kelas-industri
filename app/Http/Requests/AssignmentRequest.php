<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'sub_material_id'   => 'required',
            'title' => 'required|string',
            'description'   => 'required',
            'start_date'    => 'required|date|after_or_equal:now',
            'end_date'      => 'required|date|after_or_equal:start_date'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
