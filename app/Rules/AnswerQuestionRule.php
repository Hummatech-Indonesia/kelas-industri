<?php

namespace App\Rules;

use App\Enums\AnswerQuestionEnum;
use Illuminate\Contracts\Validation\Rule;

class AnswerQuestionRule implements Rule
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
        return in_array($value, [AnswerQuestionEnum::OPTION1->value, AnswerQuestionEnum::OPTION2->value, AnswerQuestionEnum::OPTION3->value, AnswerQuestionEnum::OPTION4->value, AnswerQuestionEnum::OPTION5->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Opsi Jawaban Tidak Valid';
    }
}
