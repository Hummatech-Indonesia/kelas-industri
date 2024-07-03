<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'material_id' => 'required|uuid|exists:materials,id',
            'total_multiple_choice' => 'required|integer|min:0',
            'total_essay' => 'required|integer|min:0',
            'multiple_choice_value' => 'required|integer|min:0',
            'essay_value' => 'required|integer|min:0',
            'time' => 'required|integer|min:0',
            'cheating_detector' => 'required|boolean',
            'last_submit' => 'required|boolean',
            'status' => 'required|in:NOTFULL,FULL',
        ];
    }

    public function messages()
    {
        return [
            'material_id.required' => 'ID materi wajib diisi.',
            'material_id.uuid' => 'ID materi harus berupa UUID yang valid.',
            'material_id.exists' => 'ID materi tidak ditemukan di database.',
            'total_multiple_choice.required' => 'Total pilihan ganda wajib diisi.',
            'total_multiple_choice.integer' => 'Total pilihan ganda harus berupa angka.',
            'total_multiple_choice.min' => 'Total pilihan ganda tidak boleh kurang dari 0.',
            'total_essay.required' => 'Total esai wajib diisi.',
            'total_essay.integer' => 'Total esai harus berupa angka.',
            'total_essay.min' => 'Total esai tidak boleh kurang dari 0.',
            'multiple_choice_value.required' => 'Nilai pilihan ganda wajib diisi.',
            'multiple_choice_value.integer' => 'Nilai pilihan ganda harus berupa angka.',
            'multiple_choice_value.min' => 'Nilai pilihan ganda tidak boleh kurang dari 0.',
            'essay_value.required' => 'Nilai esai wajib diisi.',
            'essay_value.integer' => 'Nilai esai harus berupa angka.',
            'essay_value.min' => 'Nilai esai tidak boleh kurang dari 0.',
            'time.required' => 'Waktu wajib diisi.',
            'time.integer' => 'Waktu harus berupa angka.',
            'time.min' => 'Waktu tidak boleh kurang dari 0.',
            'cheating_detector.required' => 'Detektor kecurangan wajib diisi.',
            'cheating_detector.boolean' => 'Detektor kecurangan harus berupa boolean.',
            'last_submit.required' => 'Pengiriman terakhir wajib diisi.',
            'last_submit.boolean' => 'Pengiriman terakhir harus berupa boolean.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus salah satu dari: NOTFULL, FULL.',
        ];
    }
}
