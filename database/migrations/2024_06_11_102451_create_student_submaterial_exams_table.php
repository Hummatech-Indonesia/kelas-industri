<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_submaterial_exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sub_material_exam_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('student_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('order_of_question_multiple_choice');
            $table->text('order_of_question_essay');
            $table->text('answer')->nullable();
            $table->double('score')->nullable();
            $table->integer('true_answer')->nullable();
            $table->integer('open_tab')->default(0);
            $table->datetime('finished_exam')->nullable();
            $table->dateTime('deadline')->nullable();
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
        Schema::dropIfExists('student_submaterial_exams');
    }
};
