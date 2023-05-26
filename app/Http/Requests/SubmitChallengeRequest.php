<?php

namespace App\Http\Requests;

use App\Http\Requests\SubmitChallengeRequest;

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
            'file' => 'required|file|mimes:rar,zip',
            'challenge_id' => 'required',
        ];
    }

    public function massage(): array
    {
        return [
            'file.required' => 'File tidak boleh kosong !',
            'file.mimes' => 'File harus format rar/zip!',
        ];
    }
}
