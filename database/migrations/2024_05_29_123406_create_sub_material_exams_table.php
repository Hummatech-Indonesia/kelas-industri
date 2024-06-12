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
        Schema::create('sub_material_exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sub_material_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title', 100);
            $table->string('slug');
            $table->integer('total_multiple_choice');
            $table->integer('total_essay');
            $table->integer('multiple_choice_value');
            $table->integer('essay_value');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
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
        Schema::dropIfExists('sub_material_exams');
    }
};
