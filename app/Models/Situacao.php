<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Situacao extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['descricao'];

    protected $searchableFields = ['*'];

    protected $table = 'situacoes';

    public $timestamps = false;


}
