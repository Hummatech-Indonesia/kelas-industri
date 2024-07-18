<?php

use App\Enums\MaterialExamTypeEnum;
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
        Schema::table('student_material_exams', function (Blueprint $table) {
            $table->enum('type',[MaterialExamTypeEnum::POSTEST->value, MaterialExamTypeEnum::PRETEST->value])->after('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_material_exams', function (Blueprint $table) {
            $table->enum('type',[MaterialExamTypeEnum::PRETEST->value,MaterialExamTypeEnum::POSTEST->value])->after('student_id');
        });
    }
};
