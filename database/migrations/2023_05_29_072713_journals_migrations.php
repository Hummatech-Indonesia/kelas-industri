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
        //

        Schema::create('journals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->date('date')->default(now());
            $table->text('description');
            $table->foreignUuid('classroom_id')->constrained('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('created_by')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        //
    }
};
