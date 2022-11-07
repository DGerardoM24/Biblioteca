<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->foreign(['id_editorial'], 'libros_ibfk_2')->references(['id_editorial'])->on('editoriales');
            $table->foreign(['id_clasificacion'], 'libros_ibfk_1')->references(['id_clasificacion'])->on('clasificaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign('libros_ibfk_2');
            $table->dropForeign('libros_ibfk_1');
        });
    }
}
