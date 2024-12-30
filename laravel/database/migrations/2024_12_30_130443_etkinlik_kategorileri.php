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
        Schema::create('etkinlik_kategorileri', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Acıklama');
            $table->timestamp('Tarih');
            $table->timestamp('Baslangıc Zamanı');
            $table->timestamp('Bitis Zamanı');
            $table->unsignedBigInteger('etkinlik_id');

            $table->foreign('etkinlik_id')->references('id')->on('etkinlikler');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etkinlik_kategorileri');
    }
};
