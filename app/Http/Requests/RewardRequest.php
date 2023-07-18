<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'reward_name' => 'required',
            'point' => 'required',
            'amount' => 'required',
            'photo' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }


    /**
     * set custome messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'reward_name.required' => 'Nama Hadiah tidak boleh kosong!',
            'point.required' => 'Point tidak boleh kosong!',
            'amount.required' => 'Jumlah Hadiah tidak boleh kosong!',
            'photo.mimes' => 'Foto harus dalam format PNG, JPG, atau JPEG!',
            'photo.max' => 'Ukuran foto tidak boleh melebihi :max kilobita!',
        ];
    }
}
