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
        Schema::create('school_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('school_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('package_name');
            $table->integer('price');
            $table->enum('status', ['not_yet_paid', 'already_paid', 'debt'])->default('not_yet_paid');
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
        Schema::dropIfExists('school_packages');
    }
};
