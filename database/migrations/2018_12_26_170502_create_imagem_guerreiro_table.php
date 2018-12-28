<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemGuerreiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_guerreiro', function (Blueprint $table) {
            $table->integer('guerreiro_id')->unsigned();
            $table->foreign('guerreiro_id')->references('id')->on('guerreiros');
            $table->string('imagem');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagem_guerreiro');
    }
}
