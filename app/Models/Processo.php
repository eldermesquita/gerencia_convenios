<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Processo extends Model
{
    use HasFactory;
    use Searchable;


    protected $table = 'processos';
    protected $fillable = [
        'numero',
        'ano',
        'licitado',
        'modalidade',
        'orgao_id',
        'convenio_id',
    ];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    protected $casts = [
        'licitado' => 'boolean',
    ];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class);
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function processoHistoricos()
    {
        return $this->hasMany(ProcessoHistorico::class);
    }
}
