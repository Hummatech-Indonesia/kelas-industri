<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class TeacherRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $request = [
            'name' => 'required|string',
            'email' => ['required','email', Rule::unique('users')],
            'phone_number' => 'required|max:15',
            'bank' => 'required',
            'account_number' => 'required',
            'address' => 'required'
        ];

        if (request()->routeIs('admin.teachers.update')) {
            $request['email'] = ['required','email', Rule::unique('users')->ignore($this->teacher)];
        }

        return $request;
    }

    /**
     * custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string' => 'Nama harus berupa string !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.unique' => 'Email sudah digunakan !',
            'email.email' => 'Email tidak valid !',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong !',
            'phone_number.max' => 'Nomor telepon maksimal 15 angka !',
            'address.required' => 'Alamat tidak boleh kosong !',
            'bank.required' => 'Bank tidak boleh kosong !',
            'account_number.required' => 'Bank tidak boleh kosong !',
        ];
    }
}
