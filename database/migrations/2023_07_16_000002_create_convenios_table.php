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
        Schema::create('convenios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero', 50);
            $table->year('ano');
            $table->text('objeto');
            $table->string('numero_processo', 30);
            $table->year('ano_processo');
            $table->double('valor_repasse', 10, 2);
            $table->double('valor_contra_partida', 10, 2);
            $table->double('valor_total', 10, 2);
            $table->double('valor_liberado_concedente', 10, 2);
            $table->double('valor_pago', 10, 2);
            $table->double('valor_liberado', 10, 2);
            $table->date('virgencia'); /// a partir desta data  a data padrão 60 dias para virgencia_prestacao_contas
            $table->date('virgencia_prestacao_contas'); // 60 dias
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('orgao_id');
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
