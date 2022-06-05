<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ujians', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->nullable(); //kertas
            $table->string('id_user')->nullable(); //kertas
            $table->string('id_sekolah_asal')->nullable(); //kertas
            $table->string('id_category_pelajaran')->nullable();
            $table->string('id_category_ujian')->nullable();
            // $table->string('id_ujiansekolah')->nullable();
            $table->string('total_correct')->nullable();
            $table->string('total_nilai')->nullable();
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
        Schema::dropIfExists('data_ujians');
    }
}
