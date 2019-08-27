<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->unique();
            $table->year('year');
            $table->smallInteger('duracion');
            $table->string('director');
            // FOREIGN KEY
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_genero')
                ->references('id')->on('generos')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            /*  */
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
        Schema::table('peliculas', function (Blueprint $table) {
            //
            $table->dropForeign(['id_genero']);
            $table->dropColumn('peliculas');
        });
    }
}
