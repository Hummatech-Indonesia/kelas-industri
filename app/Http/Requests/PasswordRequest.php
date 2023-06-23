<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\PasswordRequest;

class PasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    
    public function rules(): array
    {
        return [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string',
        ];
    }
    public function messages(): array
    {
        return [
            'current_password.required' => 'Password lama tidak boleh kosong!',
            'new_password.required' => 'Password baru tidak boleh kosong!',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok!',
            'new_password.min' => 'Password baru harus terdiri dari minimal :min 8 karakter!',
        ];
    }

}
