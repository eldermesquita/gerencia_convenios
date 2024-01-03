<?php

namespace App\Models;

use App\Helpers\Funcoes;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Convenio extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'convenios';
    protected $searchableFields = ['*'];
    private $funcoes;
    public $timestamps = false;
    public $formatoDataBr = 'd/m/Y';
    protected $casts = [
        'inicio_virgencia' => 'date',
        'fim_virgencia' => 'date',
        'virgencia_prestacao_contas' => 'date',
    ];

    protected $fillable = [
        'numero',
        'ano',
        'objeto',
        'valor_repasse',
        'valor_contrapartida',
        'inicio_vigencia',
        'fim_vigencia',
        'vigencia_prestacao_contas',
        'categria_id',
        'parlamentar_id',
    ];



    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->funcoes = new Funcoes();
    }


    public function getValorRepasseAttribute($value)
    {
        return $this->funcoes->formatarMoedaReal($value);
    }
    public function getValorContrapartidaAttribute($value)
    {
        return $this->funcoes->formatarMoedaReal($value);
    }

    public function getInicioVigenciaAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function getFimVigenciaAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function getVigenciaPrestacaoContasAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    /*  public function  getDataAttribute($attribute, $value)
    {
        $this->attributes[$attribute] =  Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    } */



    /*    // Mutator: Set
    public function setInicioVigenciaAttribute($value)
    {
        $this->attributes['inicio_vigencia'] = Carbon::createFromFormat($this->formatoDataBr, $value)->format('Y-m-d');
    }

    public function setFimVigenciaAttribute($value)
    {
        $this->attributes['fim_vigencia'] = Carbon::createFromFormat($this->formatoDataBr, $value)->format('Y-m-d');
    } */

    public function setVigenciaPrestacaoContasAttribute($value)
    {
        // Se o valor não for fornecido, calcula 60 dias após a data fim_vigencia
        //dd($value);
        if (empty($value)) {
            $fimVigencia = Carbon::createFromFormat('Y-m-d', $this->attributes['fim_vigencia']);
            $this->attributes['vigencia_prestacao_contas'] = $fimVigencia->addDays(60)->format('Y-m-d');
        } else {
            $this->attributes['vigencia_prestacao_contas'] = $value;
            //Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }



    public function parlamentar()
    {
        return $this->belongsTo(Parlamentar::class);
    }

    public function processo()
    {
        return $this->hasOne(Processo::class);
    }
}
