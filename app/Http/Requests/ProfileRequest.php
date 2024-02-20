<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ProfileRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'avatar_remove' => 'nullable',
            'name' => 'string',
            'email' => [ Rule::unique('users')->ignore($this->user)],
            'phone_number' => 'max:15',
            'account_number' => 'nullable|interger',
            'address' => 'string|nullable',
            'photo' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'email.unique' => 'Email sudah digunakan!',
            'phone_number.max' => 'Nomor telepon maksimal :max karakter!',
            'address.string' => 'Alamat harus berupa string!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
            'account_number.required' => 'Bank tidak boleh kosong !',
        ];
    }

}
