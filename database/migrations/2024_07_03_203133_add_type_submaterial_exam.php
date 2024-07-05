<?php

use App\Enums\SubMaterialExamTypeEnum;
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
        Schema::table('sub_material_exams', function (Blueprint $table) {
            $table->enum('type', [SubMaterialExamTypeEnum::REGISTER->value, SubMaterialExamTypeEnum::QUIZ->value])->after('slug')->default(SubMaterialExamTypeEnum::QUIZ->value);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_material_exams', function (Blueprint $table) {
            //
        });
    }
};
