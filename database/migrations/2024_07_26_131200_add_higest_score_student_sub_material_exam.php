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
        Schema::table('student_submaterial_exams', function (Blueprint $table) {
            $table->integer('higest_score')->default(0)->after('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_submaterial_exams', function (Blueprint $table) {
            Schema::dropColumns('student_submaterial_exams', 'higest_score');
        });
    }
};
