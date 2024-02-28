<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdministrationRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('administration'),
            'phone_number' => 'required|max:15',
            'address' => 'required'
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
            'phone_number.required' => 'Nomor telepon tidak boleh kosong !',
            'phone_number.max' => 'Nomor telepon maksimal 15 angka !',
            'address.required' => 'Alamat tidak boleh kosong !',
        ];
    }
}
