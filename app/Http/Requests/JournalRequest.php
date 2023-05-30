<?php

namespace App\Http\Requests;

use App\Http\Requests\JournalRequest;

class JournalRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'classroom_id' => 'required',
            'created_by' => 'required'
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
            'title.required' => 'Judul tidak boleh kosong !',
            'date.requireed' => 'Tanggal tidak boleh kosong !',
            'description.required' => 'Deskripsi tidak boleh kosong !',
            'classroom_id.string' => 'Kelas tidak boleh kosong !',
            'created_by.string' => 'Pembuat tidak boleh kosong !',
        ];
    }
}
