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
        Schema::create('tbl_data_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->char('kd_mahasiswa', 100);
            $table->char('nik', 200);
            $table->char('nim', 200);
            $table->char('nama_lengkap', 200);
            $table->char('tempat_lahir', 200);
            $table->date('tanggal_lahir', 200);
            $table->char('jurusan', 200);
            $table->char('nomor_handphone', 200);
            $table->char('email', 200);
            $table->char('username', 200);
            $table->text('alamat');
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
        Schema::dropIfExists('tbl_data_mahasiswa');
    }
};
