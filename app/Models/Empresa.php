<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome'];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
