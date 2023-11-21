<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aditivo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['numero', 'tipo', 'prazo'];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    protected $casts = [
        'prazo' => 'date',
    ];

    public function contratos()
    {
        return $this->belongsToMany(Contrato::class, 'contratos_aditivos');
    }
}
