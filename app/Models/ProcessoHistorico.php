<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProcessoHistorico extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['observacao', 'processo_id'];

    protected $searchableFields = ['*'];

    protected $table = 'processo_historicos';

    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
