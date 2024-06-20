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
        Schema::create('batch_results', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('batch_id')->constrained()->cascadeOnDelete();
            $table->foreignId('alternative_id')->constrained()->cascadeOnDelete();
            $table->integer('rank');
            $table->float('final_score', 8, 5);
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
        Schema::dropIfExists('batch_results');
    }
};
