<?php

namespace App\Http\Requests;

use App\Http\Requests\SubmitRewardRequest;

class SubmitRewardRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(): array
    {
        return [
            'reward_id' => 'required',
            'user_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'reward_id.required' => 'Reward tidak boleh kosong!',
        'user_id.required' => 'User tidak boleh kosong!',
        'address.required' => 'Alamat tidak boleh kosong!',
        'phone_number.required' => 'No Telepon tidak boleh kosong!',
    ];
}
}
