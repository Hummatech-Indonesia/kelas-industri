<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'date' => 'required',
            'photo' => 'mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
        ];
    }

    /**
     * set custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul Berita tidak boleh kosong!',
            'date.required' => 'Hari tidak boleh kosong!',
            'photo.required' => 'Photo Berita tidak boleh kosong!',
            'description.required' => 'Deskripsi tidak boleh kosong!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}
