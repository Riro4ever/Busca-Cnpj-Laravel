<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceitaFederalController extends Controller
{
    function getCNPJ($cnpj) {


        $url = "https://brasilapi.com.br/api/cnpj/v1/" . preg_replace("/[^0-9]/", "", $cnpj);

        $response = file_get_contents("https://brasilapi.com.br/api/cnpj/v1/$cnpj");

        return $response;

    }
}
