<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orgao extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome', 'esfera'];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    public function convenios()
    {
        return $this->hasMany(Convenio::class);
    }
}
