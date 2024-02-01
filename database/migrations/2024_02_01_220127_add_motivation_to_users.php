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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->nullable()->after('address');
            $table->date('date_birth')->nullable()->after('gender');
            $table->char('national_student_id', 10)->nullable()->after('date_birth');
            $table->enum('status', ['nonactive', 'active'])->nullable()->after('national_student_id');
            $table->text('motivation')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('date_birth');
            $table->dropColumn('national_student_id');
            $table->dropColumn('status');
            $table->dropColumn('motivation');
        });
    }
};
