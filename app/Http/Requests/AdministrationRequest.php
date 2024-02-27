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
        $request = [
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')],
            'phone_number' => 'required|max:15',
            'address' => 'required',
            'account_number' => 'required',
            'bank' => 'required'
        ];

        if (request()->routeIs('admin.mentors.update')) {
            $request['email'] = ['required', 'email', Rule::unique('users')->ignore($this->mentor)];
        }

        return $request;
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
            'account_number.required' => 'Nomor rekening tidak boleh kosong !',
            'bank.required' => 'Bank tidak boleh kosong !',
        ];
    }
}
