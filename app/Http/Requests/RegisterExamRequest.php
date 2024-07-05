<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\SubMaterialExamTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class RegisterExamRequest extends FormRequest
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
        return [
            'title' => 'required|max:150',
            'sub_material_id' => ['required', Rule::exists('sub_materials', 'id')],
            'total_multiple_choice' => 'nullable|integer',
            'total_essay' => 'nullable|integer',
            'type' => ['required', Rule::in([SubMaterialExamTypeEnum::REGISTER->value, SubMaterialExamTypeEnum::QUIZ->value])],
            'multiple_choice_value' => 'nullable|integer',
            'essay_value' => 'nullable|integer',
            'start_at' => 'nullable|date|after_or_equal:now',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'time' => 'nullable|regex:/^[0-9]*$/',
            'last_submit' => 'nullable|boolean',
            'cheating_detector' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'title.required' => 'Judul diperlukan.',
            'title.max' => 'Judul tidak boleh lebih dari 150 karakter.',
            'sub_material_id.required' => 'ID sub materi diperlukan.',
            'sub_material_id.exists' => 'ID sub materi tidak valid.',
            'total_multiple_choice.required' => 'Total soal pilihan ganda diperlukan.',
            'total_multiple_choice.integer' => 'Total soal pilihan ganda harus berupa angka.',
            'total_essay.required' => 'Total soal esai diperlukan.',
            'total_essay.integer' => 'Total soal esai harus berupa angka.',
            'multiple_choice_value.required' => 'Nilai per soal pilihan ganda diperlukan.',
            'multiple_choice_value.integer' => 'Nilai per soal pilihan ganda harus berupa angka.',
            'essay_value.required' => 'Nilai per soal esai diperlukan.',
            'essay_value.integer' => 'Nilai per soal esai harus berupa angka.',
            'start_at.required' => 'Waktu mulai diperlukan.',
            'start_at.date' => 'Waktu mulai harus berupa tanggal yang valid.',
            'start_at.after_or_equal' => 'Waktu mulai harus sama atau setelah waktu sekarang.',
            'end_at.required' => 'Waktu selesai diperlukan.',
            'end_at.date' => 'Waktu selesai harus berupa tanggal yang valid.',
            'end_at.after_or_equal' => 'Waktu selesai harus sama atau setelah waktu mulai.',
            'time.required' => 'Waktu pengerjaan diperlukan.',
            'time.regex' => 'Waktu pengerjaan hanya boleh berisi angka.',
            'last_submit.boolean' => 'Pilihan pengiriman terakhir harus berupa benar atau salah.',
            'cheating_detector.boolean' => 'Pilihan pendeteksi kecurangan harus berupa benar atau salah.',
        ];
    }
}
