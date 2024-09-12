<?php

extract($_GET);
error_reporting(0);

function getStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
} {
  $separador = "|";
  $e = explode("\r\n", $lista);
  $c = count($e);
  for ($i = 0; $i < $c; $i++) {
    $explode = explode($separador, $e[$i]);
    Testar(trim($explode[0]), trim($explode[1]));
  }
}

function Testar($ip)
{
  if (file_exists(getcwd() . "/cookies.txt")) {
    unlink(getcwd() . "/cookies.txt");
  }


  $time = time();



  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://ip-api.com/json/' . $ip . '');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: ip-api.com',
    'User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; SM-G610M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.185 Mobile Safari/537.36'
  ));
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data1 = curl_exec($ch);





  if (strpos($data1, '"success"')) {


    $pais = getStr($data1, '"country":"', '"');

    $estado = getStr($data1, '"region":"', '"');

    $cidade = getStr($data1, '"city":"', '"');

    $provedor = getStr($data1, '"org":"', '"');

    $cep1 = getStr($data1, '"zip":"', '"');

    $latitude = getStr($data1, '"lat":', ',');

    $longitude = getStr($data1, '"lon":', ',');

    $isp = getStr($data1, '"isp":"', '"');


    //____________________________________//
    // IFS //

    if (strpos($data1, '"zip":"",')) {
      $cep2 = "Não Encontrado";
    } else {
      $cep2 = "$cep1";
    }




    //____________________________________//

    $dados = "PAIS : $pais | ESTADO : $estado | CIDADE : $cidade | CEP : $cep2 | LATITUDE : $latitude | LONGITUDE : $longitude | ORG DA NET : $provedor | PROVEDOR : $isp";

    //____________________________________//


    echo '<b><span class="badge badge-success">✅ #AUTORIZADA »</span> ➜ <font style=color:#ffcc00> ➜ ' . $ip . ' ➜ <font style=color:#ffcc00>' . $dados . '</font> ➜ ';
  } else {
    echo '<font color="#FF0000">IP INVÁLIDO</span> ➜ ' . $ip . ' Seg</b><br>';
  }
}