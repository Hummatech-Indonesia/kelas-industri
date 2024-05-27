<?php

use App\Enums\AnswerQuestionEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_bank_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('question_bank_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('answer', [
                AnswerQuestionEnum::OPTION1->value,
                AnswerQuestionEnum::OPTION2->value,
                AnswerQuestionEnum::OPTION3->value,
                AnswerQuestionEnum::OPTION4->value,
                AnswerQuestionEnum::OPTION5->value
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_bank_answers');
    }
};
