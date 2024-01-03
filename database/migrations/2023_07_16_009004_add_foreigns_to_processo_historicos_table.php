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
        Schema::table('processo_historicos', function (Blueprint $table) {
            $table
                ->foreign('processo_id')
                ->references('id')
                ->on('processos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('processo_historicos', function (Blueprint $table) {
            $table->dropForeign(['processo_id']);
        });
    }
};
