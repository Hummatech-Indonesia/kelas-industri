<?php

namespace App\Http\Requests;


class SchoolYearRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'school_year'      => 'required'
        ];
    }

    /**
     * set custom messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'school_year.required'  => 'Tahun ajaran tidak boleh kosong !'
        ];
    }
}
