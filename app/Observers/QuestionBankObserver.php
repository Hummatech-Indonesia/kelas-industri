<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\QuestionBank;

class QuestionBankObserver
{
    /**
     * Handle the QuestionBank "creating" event.
     *
     * @param  \App\Models\QuestionBank  $QuestionBank
     * @return void
     */
    public function creating(QuestionBank $QuestionBank)
    {
        $QuestionBank->id = Uuid::uuid();
    }
}
