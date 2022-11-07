<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->integer('id_libro', true);
            $table->string('nombre_libro', 120);
            $table->string('codigo', 50)->unique('codigo');
            $table->integer('id_clasificacion')->index('id_clasificacion');
            $table->integer('id_editorial')->index('id_editorial');
            $table->string('anio_publicacion', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
