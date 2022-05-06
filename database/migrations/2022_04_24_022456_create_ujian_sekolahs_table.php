<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_sekolahs', function (Blueprint $table) {
            $table->id(); //kertas
            $table->string('id_kelas')->nullable(); //kertas
            $table->string('id_user')->nullable(); //kertas
            $table->string('id_sekolah_asal')->nullable(); //kertas
            $table->string('id_category_pelajaran')->nullable();
            $table->string('id_category_ujian')->nullable();
            $table->string('id_soalujian')->nullable();
            $table->string('id_jawaban')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujian_sekolahs');
    }
}
