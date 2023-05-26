<?php

namespace App\Http\Requests;

class SubmitAssignmentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:rar,zip',
            'assignment_id' => 'required',
        ];
    }

    public function massage(): array
    {
        return [
            'file.required' => 'File tidak boleh kosong !',
            'file.mimes' => 'File harus format rar/zip !',
        ];
    }
}
