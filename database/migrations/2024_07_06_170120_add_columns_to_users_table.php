<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('specialty')->nullable();
            $table->string('image')->nullable();
            $table->string('education')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('department');
            $table->dropColumn('image');
            $table->dropColumn('education');
            $table->dropColumn('description');
        });
    }
};
