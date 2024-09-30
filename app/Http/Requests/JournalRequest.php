<?php

namespace App\Http\Requests;

use App\Http\Requests;

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
            'date' => 'nullable',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|min:100',
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
            'date.required' => 'Tanggal tidak boleh kosong !',
            'description.required' => 'Deskripsi tidak boleh kosong !',
            'classroom_id.string' => 'Kelas tidak boleh kosong !',
            'created_by.string' => 'Pembuat tidak boleh kosong !',
            'photo.required' => 'Foto Jurnal tidak boleh kosong!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}
