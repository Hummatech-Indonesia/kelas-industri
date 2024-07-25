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
            $table->string('icon_url')->nullable();
            $table->string('via')->nullable();
            $table->string('reference')->nullable();
            $table->enum('invoice_status', ['PAID', 'UNPAID', 'EXPIRED', 'FAILED'])->default('UNPAID');
            $table->integer('total_pay');
            $table->timestamp('payment_date');
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
