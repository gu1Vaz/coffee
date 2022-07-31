<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
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
            $table->string('nome');
            $table->string('image_url');
            $table->enum('avaliacao', ['comum', 'best'])->default('comum');
            $table->string('origem');
            $table->string('produtor');
            $table->integer('preco');
            $table->enum('docura',['alta','media','baixa']);
            $table->enum('acidez',['citrica','malica','latica','fosforica','acetica']);
            $table->enum('variedade',['Bourbon Amarelo', 'Bourbon Vermelho', 'Catuaí Vermelho', 'Catuaí Amarelo','Mundo Novo','Caturra']);
            $table->string('notas');
            $table->foreignId('fornecedor_id')->references('id')->on('fornecedors')->onDelete('cascade')->OnUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
