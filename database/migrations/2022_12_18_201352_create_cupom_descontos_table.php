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
        Schema::create('cupom_descontos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("localizador")->unique();
            $table->decimal("desconto",6,2)->default(0);
            $table->enum("modo_desconto",["valor","porc"])->default("porc");
            $table->decimal("limitante",6,2)->default(0);
            $table->enum("modo_limitante",["valor","qtd"])->default("qtd");
            $table->datetime("dthr_validade");
            $table->enum("ativo",["Sim","Não"])->default("Sim");
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
        Schema::dropIfExists('cupom_descontos');
    }
};
