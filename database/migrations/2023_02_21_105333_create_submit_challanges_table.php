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
        Schema::create('submit_challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('challenge_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('student_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('is_valid', ['valid', 'not_valid']);
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
        Schema::dropIfExists('submit_challanges');
    }
};
