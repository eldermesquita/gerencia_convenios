<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrato extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'numero',
        'numero_processo',
        'virgencia',
        'virgencia_execucao',
        'valor',
        'modalidade',
        'empresa_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'contratos';

    public $timestamps = false;

    protected $casts = [
        'virgencia' => 'date',
        'virgencia_execucao' => 'date',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function convenios()
    {
        return $this->hasMany(Convenio::class);
    }

    public function aditivos()
    {
        return $this->belongsToMany(Aditivo::class, 'contratos_aditivos');
    }
}
