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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('nopol', 20);
            $table->string('merk', 15);
            $table->string('type', 50);
            $table->smallInteger('tahun');
            $table->smallInteger('jml_penumpang');
            $table->string('transmisi', 25);
            $table->boolean('isActive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
