<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero', 50);
            $table->year('ano');
            $table->text('objeto');

           /*  $table->unsignedBigInteger('orgao_id');
            $table->year('ano_processo');
            $table->string('numero_processo', 30);
            $table->boolean('licitado_processo')->default(false);
            $table->enum('modalidade_processo', [
                'Concorrência', 'Convite', 'Tomada de preço', 'Concurso', 'Pregão', 'Leilão',
            ])->default(null);
            $table->string('numero_licitacao_processo')->nullable();
          */
            $table->decimal('valor_repasse', 10, 2);
            $table->decimal('valor_contrapartida', 10, 2);
            $table->date('inicio_vigencia');
            $table->date('fim_vigencia');
            $table->date('vigencia_prestacao_contas')->nullable();

            $table->unsignedBigInteger('parlamentar_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenios');
    }
};
