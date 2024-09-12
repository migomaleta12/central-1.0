<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Dados</title>
    <link href="./login_files/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./login_files/core.css" rel="stylesheet" type="text/css">
    <style>
    body {
        background: linear-gradient(135deg, #ff0080, #ffbf00, #00ff80, #00bfff, #ff00bf);
        background-size: 400% 400%;
        animation: gradientBackground 10s ease infinite;
        font-family: Arial, sans-serif;
        color: #000000;
    }

    @keyframes gradientBackground {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    h1 {
        font-size: 35px;
        color: #fff;
        text-shadow: 2px 2px 5px #000;
    }

    .container {
        max-width: 400px;
        margin: 100px auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    input[type="text"] {
        width: 100%;
        padding: 7px;
        margin: 7px 0;
        border-radius: 5px;
        border: 5px solid #ccc;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #ff0080;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #e60073;
    }
    </style>
</head>

<body>
    <center>
        <h1>
            <font color=#000000>👹CENTRAL 1.0👹
        </h1>
        <center>
            <h1>
                <font color=#000000>Gerador de Dados
            </h1>
        </center>
    </center>
    <center>
        <div id="main">
            <?php
            error_reporting(0);

            if (isset($_POST['gerar'])) {
                function api($minimo, $maximo)
                {
                    return round($minimo - (floor($minimo / $maximo) * $maximo));
                }
                function cpf($compontos)
                {
                    $n1 = rand(0, 9);
                    $n2 = rand(0, 9);
                    $n3 = rand(0, 9);
                    $n4 = rand(0, 9);
                    $n5 = rand(0, 9);
                    $n6 = rand(0, 9);
                    $n7 = rand(0, 9);
                    $n8 = rand(0, 9);
                    $n9 = rand(0, 9);
                    $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
                    $d1 = 11 - (api($d1, 11));
                    if ($d1 >= 10) {
                        $d1 = 0;
                    }
                    $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
                    $d2 = 11 - (api($d2, 11));
                    if ($d2 >= 10) {
                        $d2 = 0;
                    }
                    $retorno = '';
                    if ($compontos == 1) {
                        $retorno = '' . $n1 . $n2 . $n3 . "." . $n4 . $n5 . $n6 . "." . $n7 . $n8 . $n9 . "-" . $d1 . $d2;
                    } else {
                        $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;
                    }
                    return $retorno;
                }
                $nms = array('José', 'Antônio', 'João', 'Francisco', 'Luiz', 'Paulo', 'Carlos', 'Manoel', 'Pedro', 'Francisca', 'Marcos', 'Raimundo', 'Sebastião', 'Fransico', 'Roberto', 'Maria', 'Ana', 'Antônia', 'Clarice', 'Mariana', 'Daniele', 'Franciele', 'Roberta', 'Ana', 'Maria',    'Heloisa', 'Adriele', 'Jaqueline', 'Sandra', 'Janaina');
                $nmsdomeio = array('Alves', 'Rocha', 'Henrique', 'Martins', 'Oliveira', 'Amaral');
                $sobrenms = array('Albuquerque', 'Bernardes', 'Vasconcelos', 'Anjos', 'Coimbra', 'Assunção', 'Amorim', 'Barcelos', 'Magalhães', 'Noronha', 'Mendonça', 'Santana', 'Miranda', 'Cavalcante', 'Queiroz', 'Freitas', 'Silva',  'Souza', 'Costa', 'Santos',  'Oliveira', 'Pereira', 'Rodrigues', 'Almeida', 'Nascimento', 'Lima', 'Araújo', 'Fernandes', 'Carvalho', 'Gomes', 'Martins', 'Rocha', 'Ribeiro', 'Alves', 'Monteiro', 'Mendes', 'Barros', 'Freitas', 'Barbosa',  'Pinto', 'Moura', 'Cavalcanti', 'Dias', 'Castro', 'Campos', 'Cardoso',);
                $dominios = array('@gmail.com', '@bol.com', '@hotmail.com', '@yahoo.com', '@outlook.com',);
                $rgs = array('14.874.147-2', '22.173.094-1', '48.199.793-3', '21.810.441-8', '19.341.839-3', '22.634.457-5', '47.976.080-9', '47.976.080-9',);
                $randNome = rand(0, count($nms) - 1);
                $randMeio = rand(0, count($nmsdomeio) - 1);
                $randSobre = rand(0, count($sobrenms) - 1);
                $randDom = rand(0, count($dominios) - 1);
                $randRG = rand(0, count($rgs) - 1);
                $nome = $nms[$randNome];
                $nomedomeio = $nmsdomeio[$randMeio];
                $sobrenome = $sobrenms[$randSobre];
                $dominio = $dominios[$randDom];
                $rg = $rgs[$randRG];
                $dia = rand(01, 28);
                $mes = rand(01, 12);
                $ano = rand(1960, 1996);
                $nasceu = ('' . $dia . '/' . $mes . '/' . $ano . '');
                $cidades = array('São Paulo' => 'SP', 'Belo Horizonte' => 'MG', 'Manaus' => 'AM', 'Maceió' => 'AL', 'Salvador' => 'BA', 'Cuiabá' => 'MT', 'Belem' => 'PA', 'João Pessoa' => 'PB', 'Recife' => 'PE', 'Palmas' => 'TO', 'Aracaju' => 'SE', 'Florianópolis' => 'SC', 'Boa Vista' => 'RR', 'Porto Velho' => 'RO', 'Porto Alegre' => 'RS', 'Natal' => 'RN', 'Rio de Janeiro' => 'RJ', 'Teresina' => 'PI', 'Recife' => 'PE', 'Curitiba' => 'PR');
                $cidade = array_rand($cidades);
                $estado = $cidades[$cidade];
                $celular = rand(9900, 9999);
                $celular2 = rand(0000, 9876);
                $casa = rand(1, 1000);
                $ddd = rand(41, 49);
                $codigo = array('93040-450', '64005-458', '72881-012', '65059-280', '64206-120', '87301-164', '47800-608', '69036-713', '77430-380', '69911-206', '48603-035', '60181-274', '69402-567', '78720-552', '29155-584');
                $randcodigo = rand(0, count($codigo) - 1);
                $cep = $codigo[$randcodigo];
                $email = $nome . "" . $sobrenome . "" . $dominio;
                $nome = $nome . " " . $nomedomeio . " " . $sobrenome;
                $city = $cidade;
                $status = $estado;
                $cod = $cep;
                $numero = cpf(1);
                $ruas = array('Rua Silvado', 'Rua Santana do Livramento', ' Rua do Corvo', 'Travessa Maravilha Tristeza', 'Avenida jose carlos Norte-Sul', 'Rua Só Nós Dois', 'Rua Quatorze de Maio', 'Rua Bororos', 'Rua Adolpho Trapani', 'Rua das Angelicas', 'Avenida Espanha', 'Rua Mar das Filipinas',);
                $randrua = rand(0, count($ruas) - 1);
                $rua = $ruas[$randrua];
                $fullname = $nome;
                $nascimento = $nasc;
                $cidade = ' ' . $city . ' / ' . $status . ' ';
                $cep = $cod;
                $pass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*", 8)), 0, 8);
            }
            echo '
&#9660; NOME &#000000;
<br>
<br>
<p>
<label  class="letras" style="for="nome" ></label> <input onclick="this.select()placeholder="NOME" class="wct" type="text" name="nome" style ="min-height: max-width: 250px; min-width: 250px;"value="  ' . $fullname . '"><br><br>
&#9660; RG &#000000;
<p>
<label  class="letras" style="for="rg"></label> <input onclick="this.select()" class="wct" type="text" name="rg"style ="min-height: max-width: 250px; min-width: 250px;" value="  ' . $rg . '"><br><br>
&#9660; CPF &#9660;
<p>
<label  class="letras" style="for="cpf"></label> <input onclick="this.select()" class="wct" type="text" name="cpf" style ="min-height: max-width: 250px; min-width: 250px;"value="  ' . $numero . '"><br><br>
&#9660; DATA DE NASCIMENTO &#9660;
<p>
<label  class="letras" style="for="Nascimento"></label> <input onclick="this.select()" class="wct" type="text" style ="min-height: max-width: 250px; min-width: 250px;"name="Nascimento" value="  ' . $nasceu . '"><br><br>
&#9660; CELULAR &#9660;
<p>
<label  class="letras" style="for="Celular"></label> <input onclick="this.select()" class="wct" type="text"style ="min-height: max-width: 250px; min-width: 250px;" name="Celular" value="  (' . $ddd . ') ' . $celular . '-' . $celular2 . '"><br><br>
&#9660; CIDADE &#9660;
<p>
<label  class="letras" style="for="Localidade"></label> <input onclick="this.select()" class="wct" type="text" style ="min-height: max-width: 250px; min-width: 250px;"name="Localidade" value="  ' . $cidade . '"><br><br>
&#9660; CEP &#9660;
<p>
<label  class="letras" style="for="Cep"></label> <input onclick="this.select()" class="wct" type="text" name="Cep"style ="min-height: max-width: 250px; min-width: 250px;" value="  ' . $cep . '"><br><br>
&#9660; RUA &#9660;
<p>
<label  class="letras" style="for="rua"></label> <input onclick="this.select()" class="wct" type="text" name="rua"style ="min-height: max-width: 250px; min-width: 250px;" value=" ' . $rua . '"><br><br>
&#9660; NÚMERO DA CASA &#9660;
<p>
<label  class="letras" style="for="casa"></label> <input onclick="this.select()" class="wct" type="text" name="casa"style ="min-height: max-width: 250px; min-width: 250px;" value=" ' . $casa . '"><br><br>
&#9660; EMAIL &#9660;
<p>
<label  class="letras" style="for="Email"></label> <input onclick="this.select()" class="wct" style ="min-height: max-width: 250px; min-width: 250px;" type="text" name="Email" value=" ' . $email . '"><br><br>
&#9660; SENHA GERADA &#9660;
<p>
<label  class="letras" style="for="Senha"></label> <input onclick="this.select()" class="wct" type="text" name="Senha" style ="min-height: max-width: 250px; min-width: 250px;" value=" ' . $pass . '"><br><br>

';
            echo '
</br>
<form action="" method="POST">
<br>
<input type="submit" class="btn btn-info" style="width: 228.22222px;"value="Gerar Pessoa" name="gerar" /> </br>&nbsp;&nbsp;&nbsp;&nbsp;
</form>';
            ?>
        </div>
    </center>
    <center>
        </br><br>
    </center>
</body>

</html>