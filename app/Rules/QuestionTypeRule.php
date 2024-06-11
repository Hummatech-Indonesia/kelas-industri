<?php

namespace App\Rules;

use App\Enums\QuestionTypeEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class QuestionTypeRule implements Rule
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
        return in_array(strtolower($value), [QuestionTypeEnum::MULTIPLECHOICE->value, QuestionTypeEnum::ESSAY->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Tipe pertanyaan tidak valid';
    }
}
