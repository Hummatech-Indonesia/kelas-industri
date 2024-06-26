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
        Schema::create('student_submaterial_exam_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('student_exam_id')->constrained('student_submaterial_exams')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('student_question_number');
            $table->text('answer')->nullable()->default(null);
            $table->integer('answer_value')->nullable();
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
        Schema::dropIfExists('student_submaterial_exam_answers');
    }
};
