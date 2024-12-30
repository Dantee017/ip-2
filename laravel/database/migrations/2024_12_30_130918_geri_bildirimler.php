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
        Schema::create('geri_bildirimler', function (Blueprint $table) {
            $table->id();
            $table->float('Rating');
            $table->string('Geri DÖnüşler');
            $table->timestamp('Yolladığı Zaman');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geri_bildirimler');
    }
};
