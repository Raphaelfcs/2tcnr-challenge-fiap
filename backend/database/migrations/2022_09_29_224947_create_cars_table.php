<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('status')
                ->default(0)
                ->comment('0 - pending / 1 - approved / 2 - rejected');
            $table->string('modalidade')->comment('1 - aluguel, 2 - venda');
            $table->string('modelo');
            $table->string('placa');
            $table->string('renavam');
            $table->string('ano');
            $table->string('cambio');
            $table->string('preco');
            $table->string('combustivel');
            $table->string('condicao');
            $table->text('descricao');
            $table->text('imagem_path');

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
        Schema::dropIfExists('cars');
    }
}
