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
        Schema::create('submit_rewards', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('reward_id')->constrained('rewards')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('address');
            $table->string('phone_number', 15)->nullable();
            $table->enum('status', ['active', 'not_active']);
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
        Schema::dropIfExists('submit_rewards');
    }
};
