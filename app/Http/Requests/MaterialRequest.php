<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends BaseRequest
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
            'title'         => 'required|string',
            'description'   => 'required',
            'devision_id'   => 'required'
        ];
    }

    /**
     * custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'generation_id.required'    => 'Angkatan tidak boleh kosong !',
            'devision_id.required'    => 'devisi tidak boleh kosong !',
            'title.required'            => 'Judul tidak boleh kosong !',
            'title.string'              => 'Judul harus berupa string !',
            'description.required'      => 'Deskripsi tidak boleh kosong !'
        ];
    }
}
