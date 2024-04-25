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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->date('deadline');
            $table->enum('status', ['new_task', 'done', 'finished', 'not_finished', 'revised'])->default('new_task');
            $table->enum('priority', ['urgent', 'important', 'regular', 'additional', 'optional']);
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
        Schema::dropIfExists('tasks');
    }
};
