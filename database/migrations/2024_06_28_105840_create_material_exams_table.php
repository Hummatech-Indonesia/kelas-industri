<?php

use App\Enums\ExamStatusEnum;
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
        Schema::create('material_exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('material_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('total_multiple_choice');
            $table->integer('total_essay');
            $table->integer('multiple_choice_value');
            $table->integer('essay_value');
            $table->integer('time');
            $table->boolean('cheating_detector')->default(0);
            $table->boolean('last_submit')->default(0);
            $table->enum('status', [ExamStatusEnum::NOTFULL->value, ExamStatusEnum::FULL->value]);
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
        Schema::dropIfExists('material_exams');
    }
};
