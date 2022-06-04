<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prosedur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
            DROP PROCEDURE IF EXISTS getGuruData;

            CREATE PROCEDURE getGuruData (
            )
            BEGIN
                SELECT * FROM users where role="guru";
            END
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS getSiswaData;

            CREATE PROCEDURE getSiswaData (
            )
            BEGIN
                SELECT * FROM users where role="siswa";
            END
        ');
    }

}
