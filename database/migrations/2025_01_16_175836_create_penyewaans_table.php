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
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lapangan_id');
            $table->bigInteger('user_id');
            $table->bigInteger('jadwal_id');
            $table->dateTime('tanggal_main');
            $table->string('metode_pembayaran');
            $table->string('link_bayar');
            $table->enum('status', ['menunggu pembayaran', 'bayar DP', 'lunas', 'batal'])->default('menunggu pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
