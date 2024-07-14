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
        Schema::table('time_slots', function (Blueprint $table) {
            // Ensure the column is unsignedBigInteger if the users.id is such
            $table->unsignedBigInteger('doc_id')->change(); // Add this line only if changing the column type is necessary
            $table->foreign('doc_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            $table->integer('doc_id')->change();
        });
    }
};
