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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('invoice_id')->unique()->nullable();
            $table->integer('fee_amount')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->enum('invoice_status', ['paid', 'pending', 'expired', 'failed'])->default('pending');
            $table->integer('total_pay');
            $table->date('payment_date');
            $table->integer('semester');
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
        Schema::dropIfExists('payments');
    }
};
