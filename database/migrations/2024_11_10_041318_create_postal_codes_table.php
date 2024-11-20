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
        Schema::create('postal_codes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('postal_code')->unique();
            $table->string('city');
            $table->string('province');
            $table->string('township');
            $table->string('locality');
            $table->string('avenue');
            $table->string('stop_street');
            $table->string('no');
            $table->string('floor');
            $table->string('zone');
            $table->string('locality_type');
            $table->string('village');
            $table->string('side_floor');
            $table->string('building_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postal_codes');
    }
};
