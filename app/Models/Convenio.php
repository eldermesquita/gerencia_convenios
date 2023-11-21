<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Convenio extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'numero',
        'ano',
        'objeto',
        'numero_processo',
        'ano_processo',
        'valor_repasse',
        'valor_contra_partida',
        'valor_total',
        'valor_liberado_concedente',
        'valor_pago',
        'valor_liberado',
        'virgencia',
        'virgencia_prestacao_contas',
        'contrato_id',
        'orgao_id',
    ];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    protected $casts = [
        'virgencia' => 'date',
        'virgencia_prestacao_contas' => 'date',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'contrato_id');
    }

    public function orgao()
    {
        return $this->belongsTo(Orgao::class,'orgao_id');
    }
}
