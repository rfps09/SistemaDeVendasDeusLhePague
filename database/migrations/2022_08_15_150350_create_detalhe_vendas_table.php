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
        Schema::create('detalhe_vendas', function (Blueprint $table) {
            $table->unsignedBigInteger('codVenda');
            $table->unsignedBigInteger('codProduto');
            $table->decimal('qtdProduto');

            $table->foreign('codVenda')->references('codVenda')->on('vendas');
            $table->foreign('codProduto')->references('codProduto')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhe_vendas');
    }
};
