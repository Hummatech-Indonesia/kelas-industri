<?php

namespace App\Http\Requests;

class ZoomScheduleRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'classroom_id' => 'required',
            'mentor_id' => 'required',
            'title' => 'required|string',
            'linked' => 'required|url',
            'date' => 'required|after_or_equal:now'
        ];
    }

    /**
     * custom messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'classroom_id.required' => 'Kelas tidak boleh kosong !',
            'mentor_id,required' => 'Mentor tidak boleh kosong !',
            'title.required' => 'Judul tidak boleh kosong !',
            'title.string' => 'Judul harus berupa string !',
            'link.required' => 'Link tidak boleh kosong !',
            'link.url' => 'Link harus berupa url !',
            'date.required' => 'Tanggal tidak boleh kosong !',
            'date.after_or_equal' => 'Tanggal harus melebihi tanggal sekarang !'
        ];
    }
}
