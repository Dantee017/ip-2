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
        Schema::create('biletler', function (Blueprint $table) {
            $table->id();
            $table->integer('Ücret');
            $table->string('Tür(Normal,Vip,VVip');
            $table->integer('Miktar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biletler');
    }
};
