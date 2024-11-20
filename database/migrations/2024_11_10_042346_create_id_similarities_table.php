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
        Schema::create('id_similarities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('national_id');
            $table->string('birthday');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('father_name');
            $table->unsignedInteger('firstNameSimilarityPercentage');
            $table->unsignedInteger('lastNameSimilarityPercentage');
            $table->unsignedInteger('fullNameSimilarityPercentage');
            $table->unsignedInteger('fatherNameSimilarityPercentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_similarities');
    }
};
