<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->string('numero_processo', 15);
            $table->date('virgencia');
            $table->date('virgencia_execucao');
            $table->double('valor', 10, 2);
            $table->enum('modalidade', [
                'concorrência',
                'convite',
                'tomada de preço',
                'concurso',
                'pregão',
                'leilão',
            ]);
            $table->unsignedBigInteger('empresa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
