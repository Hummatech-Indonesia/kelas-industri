<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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
            'photo.required' => 'Photo Gallery tidak boleh kosong!',
            'description.required' => 'Deskripsi tidak boleh kosong!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}
