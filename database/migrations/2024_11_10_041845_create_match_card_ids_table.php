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
        Schema::create('match_card_ids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('national_id')->index();
            $table->string('birthday');
            $table->string('card_number')->index();
            $table->boolean('is_match');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_card_ids');
    }
};
