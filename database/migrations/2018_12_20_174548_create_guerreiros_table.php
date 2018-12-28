<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuerreirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guerreiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('vida');
            $table->integer('defesa');
            $table->integer('dano');
            $table->decimal('ataque', 2, 1);
            $table->integer('movimento');
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
        Schema::dropIfExists('guerreiros');
    }
}
