<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInfoLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_libros', function (Blueprint $table) {
            $table->foreign(['id_autor'], 'info_libros_ibfk_2')->references(['id_autor'])->on('autores');
            $table->foreign(['id_libro'], 'info_libros_ibfk_1')->references(['id_libro'])->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_libros', function (Blueprint $table) {
            $table->dropForeign('info_libros_ibfk_2');
            $table->dropForeign('info_libros_ibfk_1');
        });
    }
}
