<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',60);
            $table->text('descricao');
            $table->binary('imagem');
            $table->decimal('preco',6,2);
            $table->integer('estoque');
            $table->enum('ativo',['Sim',"Não"])->default("Sim");
            $table->unsignedBigInteger('idCategoria');
            $table->foreign('idCategoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('produtos');
    }
};
