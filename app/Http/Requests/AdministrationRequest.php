<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdministrationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('administration'),
        ];

        // if ($this->isMethod('patch') || $this->isMethod('put')) {
        //     $rules['email'] = [
        //         'required',
        //         'email',
        //         'unique:users,email,except,id',
        //         Rule::unique('users')->ignore($this->route('mentor'))
        //     ];
        // }

        return $rules;
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string' => 'Nama harus berupa string !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.unique' => 'Email sudah digunakan !',
            'email.email' => 'Email tidal valid !',
        ];
    }
}
