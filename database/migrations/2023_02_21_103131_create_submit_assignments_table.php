<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('assignment_id')->constrained('assignments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('student_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('file');
            $table->integer('point')->nullable();
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
        Schema::dropIfExists('submit_assignments');
    }
};
