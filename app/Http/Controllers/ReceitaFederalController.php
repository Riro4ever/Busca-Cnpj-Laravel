<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ReceitaFederalController extends Controller
{
    function getCNPJ($cnpj) {

        $cnpj_formatado = preg_replace("/[^0-9]/", "", $cnpj);

        if(!$cnpj_formatado || strlen($cnpj_formatado) != 14) {
          return response()->json([
            'message' => 'CNPJ em formato inválido!'], 400);
        }

        $url = "https://brasilapi.com.br/api/cnpj/v1/" . $cnpj_formatado;

        $client = new Client();

        try {
          $res = $client->get($url);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
          return response()->json([
            'message' => $res->getBody()], $res->getStatus());
        }

        



        return $res->getBody();


    }
}
