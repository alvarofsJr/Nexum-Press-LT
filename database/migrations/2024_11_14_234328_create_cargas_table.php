<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->id('carga_id');
            $table->string('descricao', 255)->nullable();
            $table->decimal('peso', 10, 2)->nullable();
            $table->date('data_embarque')->nullable();
            $table->unsignedBigInteger('motorista_id');
            $table->unsignedBigInteger('veiculo_id');
            $table->timestamps();

            $table->foreign('motorista_id')->references('motorista_id')->on('motoristas')->onDelete('cascade');
            $table->foreign('veiculo_id')->references('veiculo_id')->on('veiculos')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};
