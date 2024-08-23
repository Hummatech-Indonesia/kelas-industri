<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'sub_material_id' => 'required',
            'title' => 'required|string',
            'description' => 'required',
            'end_date' => 'required|date|after_or_equal:start_date'
        ];

        if ($this->isMethod('post')) {
            $rules['start_date'] = 'required|date|after_or_equal:now';
        } else {
            $rules['start_date'] = 'required|date';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'sub_material_id.required' => 'ID sub materi harus diisi!',
            'title.required' => 'Judul harus diisi!',
            'title.string' => 'Judul harus berupa teks!',
            'description.required' => 'Deskripsi harus diisi!',
            'start_date.required' => 'Tanggal mulai harus diisi!',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal yang valid!',
            'start_date.after_or_equal' => 'Tanggal mulai harus sama dengan atau setelah hari ini!',
            'end_date.required' => 'Tanggal berakhir harus diisi!',
            'end_date.date' => 'Tanggal berakhir harus berupa tanggal yang valid!',
            'end_date.after_or_equal' => 'Tanggal berakhir harus sama dengan atau setelah tanggal mulai!'
        ];
    }
}
