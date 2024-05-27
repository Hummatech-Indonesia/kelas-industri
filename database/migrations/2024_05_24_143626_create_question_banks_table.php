<?php

use App\Enums\QuestionTypeEnum;
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
        Schema::create('question_banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sub_material_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('question');
            $table->longText('option1')->nullable();
            $table->longText('option2')->nullable();
            $table->longText('option3')->nullable();
            $table->longText('option4')->nullable();
            $table->longText('option5')->nullable();
            $table->enum('type', [QuestionTypeEnum::MULTIPLECHOICE->value, QuestionTypeEnum::ESSAY->value]);
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
        Schema::dropIfExists('question_banks');
    }
};
