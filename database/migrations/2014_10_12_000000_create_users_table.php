<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->nullable();
            $table->string('role')->default('siswa')->nullable();
            $table->string('no_induk')->nullable();
            $table->string('nisn')->nullable();
            $table->string('jk')->nullable();
            $table->string('gambar')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->unique();
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
