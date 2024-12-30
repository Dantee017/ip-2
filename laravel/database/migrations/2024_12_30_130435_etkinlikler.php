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
        Schema::create('etkinlikler', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Acıklama');
            $table->unsignedBigInteger('konum_id');
            $table->unsignedBigInteger('organizator_id');

            $table->foreign('konum_id')->references('id')->on('konumlar');
            $table->foreign('organizator_id')->references('id')->on('organizatorler');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etkinlikler');
    }
};
