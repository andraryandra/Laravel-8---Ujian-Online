<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianSekolahEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_sekolah_essays', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->nullable(); //kertas
            $table->string('id_user')->nullable(); //kertas
            $table->string('id_sekolah_asal')->nullable(); //kertas
            $table->string('id_category_pelajaran')->nullable();
            $table->string('id_category_ujian')->nullable();
            $table->string('id_soalujian_essay')->nullable();
            $table->string('id_jawaban_essay')->nullable();

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
        Schema::dropIfExists('ujian_sekolah_essays');
    }
}
