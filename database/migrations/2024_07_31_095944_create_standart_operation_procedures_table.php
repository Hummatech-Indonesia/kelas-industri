<?php

use App\Enums\SOPEnum;
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
        Schema::create('standart_operation_procedures', function (Blueprint $table) {
            $table->id();
            $table->text('sop');
            $table->enum('for_user', [SOPEnum::MENTOR->value, SOPEnum::STUDENT->value, SOPEnum::TEACHER->value])->unique();
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
        Schema::dropIfExists('standart_operation_procedures');
    }
};
