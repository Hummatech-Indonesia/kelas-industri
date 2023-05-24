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
        Schema::create('submit_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('attendance_id');
            $table->foreign('attendance_id')
            ->references('id')
            ->on('attendances')
            ->cascadeOnDelete();
            $table->foreignUuid('student_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();
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
        Schema::dropIfExists('submit_attendances');
    }
};
