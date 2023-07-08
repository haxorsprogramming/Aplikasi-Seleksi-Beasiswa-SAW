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
        Schema::create('tbl_event_seleksi', function (Blueprint $table) {
            $table->id();
            $table->char('kd_event', 100);
            $table->char('nama_event', 200);
            $table->text('keterangan');
            $table->integer('kuota');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->char('status_event');
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
        Schema::dropIfExists('tbl_event_seleksi');
    }
};
