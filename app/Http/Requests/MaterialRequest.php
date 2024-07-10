<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'generation_id' => 'required',
            'title'         => 'required|string',
            'description'   => 'required',
            'devision_id'   => 'required',
            'total_multiple_choice' => 'required|integer|max:100|min:0',
            'total_essay' => 'required|integer|max:100|min:0',
            'multiple_choice_value' => 'required|integer',
            'essay_value' => 'required|integer',
            'time' => 'required|regex:/^[0-9]*$/',
            'last_submit' => 'nullable|boolean',
            'cheating_detector' => 'nullable|boolean',
        ];
    }

    /**
     * custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'generation_id.required' => 'Angkatan tidak boleh kosong !',
            'devision_id.required' => 'devisi tidak boleh kosong !',
            'title.required' => 'Judul tidak boleh kosong !',
            'title.string' => 'Judul harus berupa string !',
            'description.required' => 'Deskripsi tidak boleh kosong !',
            'total_multiple_choice.required' => 'Total soal pilihan ganda diperlukan.',
            'total_multiple_choice.integer' => 'Total soal pilihan ganda harus berupa angka.',
            'total_essay.required' => 'Total soal esai diperlukan.',
            'total_essay.integer' => 'Total soal esai harus berupa angka.',
            'multiple_choice_value.required' => 'Nilai per soal pilihan ganda diperlukan.',
            'multiple_choice_value.integer' => 'Nilai per soal pilihan ganda harus berupa angka.',
            'essay_value.required' => 'Nilai per soal esai diperlukan.',
            'essay_value.integer' => 'Nilai per soal esai harus berupa angka.',
            'time.required' => 'Waktu pengerjaan diperlukan.',
            'time.regex' => 'Waktu pengerjaan hanya boleh berisi angka.',
            'last_submit.boolean' => 'Pilihan pengiriman terakhir harus berupa benar atau salah.',
            'cheating_detector.boolean' => 'Pilihan pendeteksi kecurangan harus berupa benar atau salah.',
        ];
    }
}
