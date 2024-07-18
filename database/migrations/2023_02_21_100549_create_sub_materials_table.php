pp<?php

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
        Schema::create('sub_materials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('material_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->text('student_file')->nullable();
            $table->text('teacher_file')->nullable();
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
        Schema::dropIfExists('sub_materials');
    }
};
