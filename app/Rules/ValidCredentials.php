<?php

namespace App\Rules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;

class ValidCredentials implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Auth::attempt(['email' => request('email'), 'password' => $value]);
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password yang Anda masukkan salah.';
    }
}
