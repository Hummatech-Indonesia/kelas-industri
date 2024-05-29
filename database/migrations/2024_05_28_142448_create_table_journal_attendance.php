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
        Schema::create('journal_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('journal_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_classroom_id')->constrained('student_classrooms', 'id')->onDelete('cascade');
            $table->enum('attendance', ['hadir', 'sakit', 'ijin', 'alfa'])->default('hadir');
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
        Schema::dropIfExists('table_journal_attendance');
    }
};
