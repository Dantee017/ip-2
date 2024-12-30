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
        Schema::create('etkinlik_cizelgesi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etkinlik_id');
            $table->string('etkinlik adı');
            $table->timestamp('Baslangıc Zamanı');
            $table->timestamp('Bitiş Zamanı');
            $table->foreign('etkinlik_id')->references('id')->on('etkinlikler');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etkinlik_cizelgesi');
    }
};
