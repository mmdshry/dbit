<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('id_information', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('national_id')->unique();
            $table->string('birthday');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->boolean('gender');
            $table->string('live_status');
            $table->string('identification_number');
            $table->string('identification_serial');
            $table->string('identification_series');
            $table->string('office_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_information');
    }
};
