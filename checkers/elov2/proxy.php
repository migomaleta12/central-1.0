<?php
do {
$arquivo = "socks.txt";
$fp = fopen($arquivo, "r");
$conteudo = fread($fp, filesize($arquivo));
fclose($fp);
$separar = explode("\n", $conteudo);
$rand1 = rand(0, 1779); //Numero de socks
$proxy = $separar[$rand1];
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'http://google.com/logo.jpg'); 
curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1); 
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
curl_setopt($ch, CURLOPT_TIMEOUT, 1);
$data = curl_exec($ch);
if ($data === false) 
{
	$d = 1;
} 
else 
{
    echo $proxy;
	$d = 0;
}
} while ($d > 0);
?>