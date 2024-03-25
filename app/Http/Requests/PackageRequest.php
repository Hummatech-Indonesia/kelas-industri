<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PackageRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function massages()
    {
        return [
            'name.required' => 'Nama paket harus diisi',
            'price.required' => 'Harga paket harus diisi',
            'description.required' => 'Deskripsi paket harus diisi',
            'image.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'image.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}

