<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id');
            $table->string('invoice', 100);
            $table->string('nama_pelanggan', 70);
            $table->string('telp', 20);
            $table->string('catatan', 255);
            $table->string('layanan', 50);
            $table->string('tujuan', 50);
            $table->string('mulai_sewa', 20);
            $table->smallInteger('lama_sewa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
