<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerationRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'school_year_id'    => 'required',
            'generation'        => 'required|string'
        ];
    }

    /**
     * set custome messages
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'school_year_id.required'   => 'Tahun ajaran tidak boleh kosong !',
            'generation.required'       => 'Angkatan tidak boleh kosong !',
            'generation.string'         => 'Angkatan harus berupa string !'
        ];
    }
}
