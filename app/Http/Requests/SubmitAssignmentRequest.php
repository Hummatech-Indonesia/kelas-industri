<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Http\Requests\SubmitAssignmentRequest;

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
            'file' => 'required|file|mimes:rar,zip,png,jpg,jpeg',
            'assignment_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'File tidak boleh kosong!',
            'file.file' => 'File harus dalam format rar atau zip!',
            'file.mimes' => 'File harus memiliki ekstensi rar, zip atau PNG, JPG, dan JPEG!',
        ];
    }

}
