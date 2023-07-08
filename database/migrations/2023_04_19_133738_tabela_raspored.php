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
        Schema::create('rasporedi', function (Blueprint $table) {
            $table->id();
            $table->integer('danId');
            $table->integer('terminId');
            $table->integer('treningId');
            $table->string('trener');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rasporedi');
    }
};
