<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusiUjianKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusi_ujian_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->nullable();
            $table->string('id_sekolah_asal')->nullable();
            $table->string('id_category')->nullable();
            $table->string('id_category_ujian')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('distribusi_ujian_kelas');
    }
}
