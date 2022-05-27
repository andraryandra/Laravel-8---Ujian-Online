<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_essays', function (Blueprint $table) {
            $table->id();
            $table->string('id_sekolah_asal')->nullable();
            $table->string('id_category')->nullable();
            $table->string('soal_ujian_essay')->nullable();
            $table->string('jawaban_essay')->nullable();
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
        Schema::dropIfExists('post_essays');
    }
}
