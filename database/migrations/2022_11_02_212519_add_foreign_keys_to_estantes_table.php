<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estantes', function (Blueprint $table) {
            $table->foreign(['id_infolibro'], 'estantes_ibfk_2')->references(['id_infolibro'])->on('info_libros');
            $table->foreign(['id_persona'], 'estantes_ibfk_1')->references(['id_persona'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estantes', function (Blueprint $table) {
            $table->dropForeign('estantes_ibfk_2');
            $table->dropForeign('estantes_ibfk_1');
        });
    }
}
