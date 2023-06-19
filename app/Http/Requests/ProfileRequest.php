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
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string',
            'avatar_remove' => 'nullable',
            'name' => 'required|string',
            'email' => ['required', Rule::unique('users')->ignore($this->user)],
            'phone_number' => 'max:15',
            'address' => 'string|nullable',
            'photo' => 'mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
