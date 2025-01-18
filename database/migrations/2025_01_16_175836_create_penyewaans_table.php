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
            $table->string('pembayaran_id');
            $table->bigInteger('lapangan_id');
            $table->bigInteger('user_id');
            $table->time('waktu_main');
            $table->date('tanggal_main');
            $table->string('metode_pembayaran');
            $table->string('no_pembayaran');
            $table->string('status');
            $table->enum('tipe_pembayaran', ['dp', 'full'])->default('dp');
            $table->bigInteger('harga_bayar');
            $table->bigInteger('harga_full');
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
