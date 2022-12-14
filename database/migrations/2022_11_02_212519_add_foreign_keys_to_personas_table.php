<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->foreign(['id_tipo_persona'], 'personas_ibfk_1')->references(['id_tipo_personas'])->on('tipo_personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign('personas_ibfk_1');
        });
    }
}
