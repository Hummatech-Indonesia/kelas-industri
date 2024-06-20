<?php

namespace App\Http\Requests\Spk;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class CriteriaRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'devision_id' => 'required|exists:devisions,id',
            'name' => ['required', 'max:100', Rule::unique('criterias')->where('status', 1)->ignore($this->criterion)],
            'type' => ['required'],
            'weight' => 'required|regex:/^[0-9]*$/|integer|min:0'
        ];
    }

    /**
     * Get the validation rules message.
     *
     * @return array
     */

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 100 karakter',
            'name.unique' => 'Kriteria telah terdaftar',
            'type.required' => 'Tipe kriteria harus diisi',
            'weight.required' => 'Bobot harus diisi',
            'weight.regex' => 'Bobot harus berupa angka',
            'weight.integer' => 'Bobot tidak valid',
            'weight.min' => 'Bobot minimal angka 0'
        ];
    }
}
