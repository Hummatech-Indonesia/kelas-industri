<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\News;

class NewsUniqueRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
{
    $cek_status = News::where('status', 'On')->exists();

    return $value !== 'On' || !$cek_status;
}

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Ada berita lainnya yang sudah memiliki status Berita Utama';
    }
}
