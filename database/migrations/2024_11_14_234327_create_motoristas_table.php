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
        Schema::create('motoristas', function (Blueprint $table) {
            $table->id('motorista_id');
            $table->string('nome', 100);
            $table->string('cnh', 20)->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motoristas');
    }
};
