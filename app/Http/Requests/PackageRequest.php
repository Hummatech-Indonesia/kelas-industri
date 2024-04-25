<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PackageRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'price' => 'required|max:50',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'status' => 'required|in:collective,individual',
        ];
    }

    public function massages()
    {
        return [
            'name.required' => 'Nama paket harus diisi',
            'name.max' => 'Nama paket tidak boleh melebihi :max karakter',
            'price.required' => 'Harga paket harus diisi',
            'price.max' => 'Harga paket tidak boleh melebihi :max karakter',
            'description.required' => 'Deskripsi paket harus diisi',
            'image.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'image.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
            'status.required' => 'Status paket harus diisi',
            'status.in' => 'Status harus berupa Paket Sekolah atau Paket Individu!',
        ];
    }
}

