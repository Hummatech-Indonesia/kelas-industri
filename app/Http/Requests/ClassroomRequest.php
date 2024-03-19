<?php

namespace App\Http\Requests;

class ClassroomRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'generation_id' => 'required',
            'name' => 'required|string'
        ];
    }

    /**
     * custom messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'generation_id.required' => 'Angkatan tidak boleh kosong !',
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string' => 'Nama harus berupa string !'
        ];
    }
}
