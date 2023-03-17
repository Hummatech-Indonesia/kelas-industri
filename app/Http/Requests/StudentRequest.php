<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class StudentRequest extends BaseRequest
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
            'email' => ['required', Rule::unique('users')],
            'phone_number' => 'required|max:15',
            'address' => 'required'
        ];

        if (request()->routeIs('school.students.update')) {
            $request['email'] = ['required', Rule::unique('users')->ignore($this->student)];
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
            'phone_number.required' => 'Nomor telepon tidak boleh kosong !',
            'phone_number.max' => 'Nomor telepon maksimal 15 angka !',
            'address.required' => 'Alamat tidak boleh kosong !'
        ];
    }
}
