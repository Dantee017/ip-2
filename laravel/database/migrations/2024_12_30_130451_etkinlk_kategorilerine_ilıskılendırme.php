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
        Schema::create('etkinlik_kategorilerine_ilıskılendırme', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etkinlik_id');
            $table->unsignedBigInteger('kategori_id');

            $table->foreign('etkinlik_id')->references('id')->on('etkinlikler');
            $table->foreign('kategori_id')->references('id')->on('etkinlik_kategorileri');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etkinlik_kategorilerine_ilıskılendırme');
    }
};
