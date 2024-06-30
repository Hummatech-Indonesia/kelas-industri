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
            $table->integer('total_multiple_choice')->nullable();
            $table->integer('total_essay')->nullable();
            $table->integer('multiple_choice_value')->nullable();
            $table->integer('essay_value')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->integer('time')->nullable();
            $table->integer('total_student')->nullable();
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
