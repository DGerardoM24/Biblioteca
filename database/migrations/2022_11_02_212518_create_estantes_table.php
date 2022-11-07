<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estantes', function (Blueprint $table) {
            $table->integer('id_estante', true);
            $table->integer('id_persona')->index('id_persona');
            $table->integer('id_infolibro')->index('id_infolibro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estantes');
    }
}
