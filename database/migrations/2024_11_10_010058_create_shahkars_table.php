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
        Schema::create('shahkars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('national_id')->index();
            $table->string('mobile')->index();
            $table->boolean('is_match')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shahkars');
    }
};
