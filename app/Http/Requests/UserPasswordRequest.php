<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Http\Requests\UserPasswordRequest;

class UserPasswordRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules(): array
    {
        return [
            'password' => 'required|min:8|string',
        ];
    }
    public function messages(): array
    {
        return [
            'password.required' => 'Password baru tidak boleh kosong!',
            'password.min' => 'Password baru harus terdiri dari minimal 8 karakter!',
        ];
    }

}
