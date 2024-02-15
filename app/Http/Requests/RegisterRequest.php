<?php

namespace App\Http\Requests;

use App\Rules\GenderRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
{
    return [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'address' => 'required',
        'school_id' => 'required',
        'classroom_id' => 'required',
        'national_student_id' => 'required|min:10|max:10|unique:users,national_student_id,except,national_student_id',
        'date_birth' => 'required|date|before_or_equal:today',
        'gender' => ['required', new GenderRule],
        'motivation' => 'required',
    ];
}

public function messages()
{
    return [
        'name.required' => 'Nama harus diisi.',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email tidak boleh lebih dari :max karakter.',
        'email.unique' => 'Email sudah digunakan.',
        'address.required' => 'Alamat harus diisi.',
        'school_id.required' => 'Sekolah harus dipilih.',
        'classroom_id.required' => 'Kelas harus dipilih.',
        'national_student_id.required' => 'Nomor induk siswa harus diisi.',
        'national_student_id.max' => 'Nomor induk siswa tidak boleh lebih dari :max karakter.',
        'national_student_id.min' => 'Nomor induk siswa tidak boleh kurang dari :min karakter.',
        'national_student_id.unique' => 'Nomor induk siswa sudah digunakan.',
        'date_birth.required' => 'Tanggal lahir harus diisi.',
        'date_birth.date' => 'Format tanggal lahir tidak valid.',
        'date_birth.before_or_equal' => 'Tanggal lahir harus sebelum atau sama dengan hari ini.',
        'gender.required' => 'Jenis kelamin harus dipilih.',
        'motivation.required' => 'Motivasi harus diisi.',
    ];
}

}
