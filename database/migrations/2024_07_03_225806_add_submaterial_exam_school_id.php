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
        Schema::table('sub_material_exams', function (Blueprint $table) {
            $table->foreignUuid('school_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->after('sub_material_id')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_material_exam', function (Blueprint $table) {
            //
        });
    }
};
