<?php

namespace App\Helpers;

class Funcoes
{
// Formatar como moeda
public static function formatarMoedaReal($valor)
{
return number_format($valor, 2, ',', '.');
}

}
