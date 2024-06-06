<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required",
            "description" => "required",
            "location" => "required",
            "limit_participant" => "nullable|integer",
            "for_school" => "nullable",
            "photo" => "mimes:png,jpg,jpeg|max:2048",
            "thumnail" => "mimes:png,jpg,jpeg|max:2048",
            "start_date" => "required",
            "end_date" => "required",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'start_date.required' => 'Tangal mulai tidak boleh kosong',
            'end_date.required' => 'Tanggal Berakhir tidak boleh kosong',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
        ];
    }
}
