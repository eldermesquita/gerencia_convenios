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
        Schema::create('processos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->year('ano');
            $table
                ->boolean('licitado')
                ->default(false)
                ->nullable();
            $table->enum('modalidade',
            [
                'Concorrência', 'Convite', 'Tomada de preço', 'Concurso', 'Pregão', 'Leilão',
            ])->default(null);
            $table->unsignedBigInteger('orgao_id');
            $table->unsignedBigInteger('convenio_id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processos');
    }
};
