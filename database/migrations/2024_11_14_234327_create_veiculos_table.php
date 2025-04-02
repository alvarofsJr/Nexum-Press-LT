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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id('veiculo_id');
            $table->string('placa', 7)->unique();
            $table->string('modelo', 100)->nullable();
            $table->string('marca', 50)->nullable();
            $table->integer('ano_fabricacao')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
