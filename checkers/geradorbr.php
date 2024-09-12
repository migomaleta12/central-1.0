<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['usuario']) or !isset($_SESSION['senha'])){
  echo "<script>location.href='/'</script>";
  die();
}
$array_usuarios = file("vaidescubrirnunca/antilixo.txt");
$total_usuarios_registrados = count($array_usuarios);

for($i=0;$i<count($array_usuarios);$i++){
  $explode = explode("|" , $array_usuarios[$i]);
  if($_SESSION['usuario'] == $explode[0]){


    $_SESSION['senha'] = $explode[1];
    $_SESSION['rank'] = $explode[2];
    $_SESSION['creditos'] = $explode[3];
    $_SESSION['foto'] = $explode[4];
  }
}




for($i=0;$i<count($files_checkers);$i++){
if(strpos($files_checkers[$i] , ".php") !== false){
  $total_checkers++;
}
}
$total_checkers--;
?>
<?php
#  Coder : https://t.me/CentralNeon
#  Sexta-Feira 16:54 - 2017
#  Gerador de Pessoas 
function _curl($url, $post = false, $header = '', $header_out = true, $follow_loc = true, $json = false) {
$ckfile = 'cookies.txt';
$randIP = "" . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
$ch = curl_init();
if ($post) {
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, $header_out);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $follow_loc);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
if ($json){
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json; charset=UTF-8',
'Connection: Keep-Alive',
'Accept: application/json, text/plain, */*',
$header,));}
else{
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Connection: Keep-Alive', "REMOTE_ADDR: $randIP", "HTTP_X_FORWARDED_FOR: $randIP",
$header,));}
curl_setopt($ch, CURLOPT_COOKIESESSION, $ckfile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
curl_setopt($ch, CURLOPT_COOKIE, $ckfile);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
$result = curl_exec($ch);
curl_close($ch);
return $result;
}
if (isset($_POST['x'])) {
$busca = _curl('https://cubetechnology.org/api', false, false, false, true);
#echo $busca;
$decoder = json_decode($busca,true);
$nome = $decoder['name'];
$last = $decoder['lastname'];
$rua = $decoder['street'];
$cpf = $decoder['cpf'];
$cep = $decoder['cep'];
$city = $decoder['city'];
$bairro = $decoder['bairro'];
$cnpj = $decoder['cnpj'];



}


// ID = 332657742






?>

<!DOCTYPE html>
<html>

<head>
  <title>#ALEX</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div align="center">
<h1>Gerador</h1>
<form method="POST">
  <input type="submit" name="x" class="btn btn-danger" value="GERAR"><br><br>


  <table class="table table-striped" id="tabAprovadas" name="tabAprovadas">
    <thead>
      <tr>
        <th><center>Nome</center></th>
        <th><center>CPF</center></th>
        <th><center>CEP</center></th>
        <th><center>Endereço</center></center></th>
        <th><center>Cidade</center></th>
        <th><center>Bairro</center></th>
        <th><center>CNPJ</center></th>
		
      </tr>
    </thead>
    <tbody>

      <tr>
        <th><center><?php echo $nome; ?>&nbsp;<?php echo $last; ?></center></th>
        <th><center><?php echo $cpf; ?></center></th>
        <th><center><?php echo $cep; ?></center></th>
        <th><center><?php echo $rua; ?></center></th>
        <th><center><?php echo $city; ?></center></th>
        <th><center><?php echo $bairro; ?></center></th>
        <th><center><?php echo $cnpj; ?></center></th>
      </tr>
    </tbody>
  </table>
</div>
  
      </form>


</body>
</html>