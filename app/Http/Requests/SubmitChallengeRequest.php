<?php

namespace App\Http\Requests;

class SubmitChallengeRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file|max:5120|mimes:rar,zip,png,jpg,jpeg',
            'challenge_id' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'file.required' => 'File tidak boleh kosong!',
        'file.file' => 'File harus dalam format rar atau zip!',
        'file.mimes' => 'File harus memiliki ekstensi rar, zip atau PNG, JPG, dan JPEG!',
        'file.max' => 'File tidak boleh lebih besar dari 5 MB!',
    ];
}
}
