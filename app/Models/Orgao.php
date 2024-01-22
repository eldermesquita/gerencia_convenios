<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orgao extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'orgaos';
    protected $fillable = ['nome', 'esfera'];
    protected $searchableFields = ['*'];
    public $timestamps = false;

    public function processo()
    {
        return $this->hasMany(Processo::class);
    }
}
