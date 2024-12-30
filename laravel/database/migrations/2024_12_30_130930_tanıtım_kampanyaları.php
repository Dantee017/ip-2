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
        Schema::create('tanıtım_kampanyaları', function (Blueprint $table) {
            $table->id();
            $table->string('Platform(e-mail,Social Media)');
            $table->timestamp('Baslangıc Tarihi');
            $table->timestamp('Bitiş Tarihi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanıtım_kampanyaları');
    }
};
