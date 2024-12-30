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
        Schema::create('etkinlik_raporları', function (Blueprint $table) {
            $table->id();
            $table->integer('Toplam Katılımcı Sayısı');
            $table->float('Ortalama Etkinlik Puanı');
            $table->integer('Hasılat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etkinlik_raporları');
    }
};
