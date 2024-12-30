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
        Schema::create('indirimler', function (Blueprint $table) {
            $table->id();
            $table->string('Kod')->unique();
            $table->integer('İndirim Miktarı');
            $table->timestamp('Geçerlilik Tarihi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirimler');
    }
};
