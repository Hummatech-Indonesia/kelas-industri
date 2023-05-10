<?php

namespace App\Http\Requests;

class ChallengeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'classroom_id' => 'required',
            'created_by' => 'required',
            'difficulty' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'point' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
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
            'created_by.requireed' => 'Pembuat tidak boleh kosong !',
            'difficulty.required' => 'Nama tidak boleh kosong !',
            'title.required' => 'Nama harus berupa string !',
            'description.required' => 'Nama harus berupa string !',
            'point.required' => 'Nama harus berupa string !',
            'start_date.required' => 'Nama harus berupa string !',
            'end_date.required' => 'Nama harus berupa string !',
        ];
    }
}
