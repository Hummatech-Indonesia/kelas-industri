<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\SubMaterialExamTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'name'              => 'required|string',
            'headmaster'        => 'nullable|string',
            'address'           => 'required',
            'phone_number'      => 'nullable|max:15',
            'email'             => ['required', 'email', Rule::unique('users')],
            'password'          => 'confirmed|max:15',
            'photo'             => 'required|file|max:2048|mimes:jpg,jpeg,png',
        ];

        if ($this->has('regristation_exam')) {
            $rules['sub_material_id'] = ['required', Rule::exists('sub_materials', 'id')];
            $rules['total_multiple_choice'] = 'required|integer';
            $rules['type'] = ['required', Rule::in([SubMaterialExamTypeEnum::REGISTER->value, SubMaterialExamTypeEnum::QUIZ->value])];
            $rules['start_at'] = 'required|date|after_or_equal:now';
            $rules['end_at'] = 'required|date|after_or_equal:start_at';
            $rules['time'] = 'required|regex:/^[0-9]*$/';
            $rules['last_submit'] = 'nullable|boolean';
            $rules['cheating_detector'] = 'nullable|boolean';
        }

        if (request()->routeIs('admin.schools.update')) {
            $rules['photo'] = 'file|max:2048|mimes:jpg,jpeg,png';
            $rules['email'] = ['required', 'email', Rule::unique('users')->ignore($this->school)];
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
            'email.email'      => 'Email tidak valid !',
            'password.confirmed'    => 'Konfirmasi password tidak sesuai !',
            'password.max'  => 'Panjang password maksimal 15 angka !',
            'photo.required'    => 'Photo tidak boleh kosong !',
            'photo.file'        => 'Photo harus berupa file !',
            'photo.max'        => 'Ukuran photo maksimal 2Mb !',
            'photo.mimes'       => 'Ekstensi tidak diperbolehkan !'
        ];
    }
}
