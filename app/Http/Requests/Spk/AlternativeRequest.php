<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class AlternativeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100', Rule::unique('alternatives')->where('status', 1)->ignore($this->alternative)]
        ];
    }

    /**
     * Validation custom Messages.
     *
     * @return array
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama alternatif telah terdaftar',
            'name.max' => 'Nama maksimal 100 karakter',
        ];
    }
}
