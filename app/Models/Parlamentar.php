<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parlamentar extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['codigo', 'nome'];

    protected $searchableFields = ['*'];

    protected $table = 'parlamentares';

    public $timestamps = false;

    public function convenios()
    {
        return $this->hasMany(Convenio::class);
    }
}
