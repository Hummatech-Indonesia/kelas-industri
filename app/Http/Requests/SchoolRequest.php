<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'name'              => 'required|string',
            'headmaster'        => 'nullable|string',
            'address'           => 'required',
            'phone_number'      => 'nullable|max:15',
            'email'             => ['required', Rule::unique('users')],
            'password'          => 'required|confirmed',
            'photo'             => 'required|file|max:2048|mimes:jpg,jpeg,png'
        ];

        if(request()->routeIs('admin.schools.update')){
            $rules['photo'] = 'file|max:2048|mimes:jpg,jpeg,png';
            $rules['email'] = ['required', Rule::unique('users')->ignore($this->school)];
        }

        return $rules;
    }

    /**
     * set custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string'   => 'Nama harus berupa string !',
            'headmaster.string' => 'Kepala sekolah harus berupa string !',
            'phone_number.max'  => 'Panjang nomor telepon maksimal 15 angka !',
            'address.required'  => 'Alamat tidak boleh kosong !',
            'email.required'    => 'Email tidak boleh kosong !',
            'email.unique'      => 'Email telah digunakan !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.confirmed'    => 'Konfirmasi password tidak sesuai !',
            'photo.required'    => 'Photo tidak boleh kosong !',
            'photo.file'        => 'Photo harus berupa file !',
            'photo.max'        => 'Ukuran photo maksimal 2Mb !',
            'photo.mimes'       => 'Ekstensi tidak diperbolehkan !'
        ];
    }
}
