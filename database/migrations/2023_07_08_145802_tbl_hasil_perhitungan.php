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
        Schema::create('tbl_hasil_perhitungan', function (Blueprint $table) {
            $table->id();
            $table->char('kd_perhitungan', 100);
            $table->char('kd_event', 200);
            $table->char('kd_mahasiswa', 200);
            $table->float('total_nilai');
            $table->integer('ranking');
            $table->char('status', 50);
            $table->char('active', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hasil_perhitungan');
    }
};
