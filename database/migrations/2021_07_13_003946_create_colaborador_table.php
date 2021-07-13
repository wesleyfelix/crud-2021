<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cargo_id');
            $table->string('nome', 50);
            $table->string('cpf', 50);
            $table->integer('idade');
            $table->string('cep', 9);
            $table->string('rua', 50);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('uf', 2);
            $table->integer('numero')->nullable();
            $table->foreign('cargo_id')
                ->references('id')->on('cargo');
            $table->date('admissao');
            $table->boolean('status');
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
        Schema::dropIfExists('colaborador');
    }
}
