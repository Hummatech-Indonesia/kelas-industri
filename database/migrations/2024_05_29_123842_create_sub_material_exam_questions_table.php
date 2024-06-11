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
        Schema::create('sub_material_exam_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('sub_material_exam_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('question_bank_id')->constrained();
            $table->integer('question_number');
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
        Schema::dropIfExists('sub_material_exam_questions');
    }
};
