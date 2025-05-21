<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualandetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('penjualan_id');
            $table->foreignId('produk_id');
            $table->integer('jumlah');
            $table->integer('total');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualandetails');
    }
};
