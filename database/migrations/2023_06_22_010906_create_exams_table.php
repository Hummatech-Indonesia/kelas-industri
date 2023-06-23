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
        Schema::create('exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('student_classroom_id');
            $table->foreign('student_classroom_id')
            ->references('id')
            ->on('student_classrooms')
            ->cascadeOnDelete();
            $table->enum('exam_type', ['uts', 'uas']);
            $table->integer('complexity');
            $table->integer('code_cleanliness');
            $table->integer('design');
            $table->integer('presentation');
            $table->integer('understanding');
            $table->enum('task_level', ['easy', 'medium', 'advance']);
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
        Schema::dropIfExists('exams');
    }
};
