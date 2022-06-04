<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerateIdSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // INSERT INTO sequence_tbls VALUES (NULL);
        DB::unprepared('
                CREATE TRIGGER id_secret_sekolah BEFORE INSERT ON sekolahs FOR EACH ROW
                    BEGIN
                        INSERT INTO sequence_tbls VALUES (NULL);
                        SET NEW.id_secret = CONCAT("TI_", LPAD(LAST_INSERT_ID(), 10, "0"));
                    END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "id_secret_sekolah"');
    }
}
