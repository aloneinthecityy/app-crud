<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //criando a tabela "products";

        /* Após salvar os comandos de criação de uma tabela,
        para executar a migration usamos o seguinte comando no terminal:
        "php artisan migrate;" */
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //criando as colunas dessa tabela;
            $table->integer('qty');
            $table->decimal('price');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
