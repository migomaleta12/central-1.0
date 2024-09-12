<?php

error_reporting(0);
set_time_limit(0);
session_start();

if (!file_exists("kadhsf.txt")) {
    $fopen = fopen("kadhsf.txt", "a+");
    fclose($fopen);
}

if (isset($_SESSION['usuario']) && isset($_SESSION['senha'])) {
    session_destroy();
    session_start();
}

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $array = file("kadhsf.txt");

    if (empty($usuario) || empty($senha)) {
        $message = "<br><br><font class='badge badge-danger'>Erro:</font> Informações de login inválidas.";
    } else {
        $logado = false;
        foreach ($array as $linha) {
            $explode = explode("|", $linha);

            if ($explode[0] == $usuario && $explode[1] == $senha) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                $_SESSION['rank'] = $explode[2];
                $_SESSION['creditos'] = $explode[3];
                $_SESSION['foto'] = $explode[4];
                $logado = true;
                break;
            }
        }

        if ($logado) {
            $message = "<br><br><font class='badge badge-success'>Retorno:</font> Informações de login corretas! Aguarde 3 segundos para ser redirecionado para o painel.";
            echo '<meta http-equiv="refresh" content="3;url=../painel.php">';
        } else {
            $message = "<br><br><font class='badge badge-danger'>Erro:</font> Dados de login incorretos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>👹CENTRAL 1.0👹</title>
    <style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
        overflow: hidden;
    }

    .background {
        position: relative;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .login-container {
        background: rgba(0, 0, 0, 0.6);
        padding: 20px;
        border-radius: 10px;
        color: #fff;
        width: 300px;
        text-align: center;
        z-index: 2;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container label,
    .login-container input {
        width: 80%;
        margin-bottom: 10px;
    }

    .login-container input {
        padding: 10px;
        border: none;
        border-radius: 5px;
    }

    .login-container button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: white;
        cursor: pointer;
        width: 87%;
        font-size: 16px;
    }

    .login-container button:hover {
        background-color: #00CC00;
    }

    .contact-link {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .contact-link a {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    .contact-link img {
        width: 24px;
        height: 24px;
        margin-left: 8px;
    }

    /* Contador de visitas no canto inferior direito */
    .contador-container {
        position: fixed;
        right: 10px;
        bottom: 10px;
        z-index: 3;
        text-align: center;
    }

    .contador-container label {
        color: white;
        font-size: 14px;
        display: block;
        margin-bottom: 5px;
    }
    </style>
</head>

<body>

    <div class="background">
        <video autoplay loop muted>
            <source src="video.mp4" type="video/mp4">
            Seu navegador não suporta o elemento de vídeo.
        </video>

        <div class="login-container">
            <h2>👹CENTRAL 1.0👹</h2>

            <form action="" method="post">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" required placeholder="Usuário"><br>

                <label for="password">Senha</label>
                <input type="password" id="password" name="senha" required placeholder="Senha"><br>

                <button type="submit">Entrar</button>
            </form>
            <div class="contact-link">
                <img src="https://i.ibb.co/vmqgQXK/zapp.png" alt="zapp">
                <a href="https://wa.me/5511918533460" target="_blank">Entre em contato Vulgo7</a>
            </div>

            <?php if (isset($message)) echo $message; ?>
        </div>

        <!-- Contador de visitas no canto inferior direito -->
        <div class="contador-container">
            <label for="visitas">Visitas</label>
            <a title='Contador de Visitas do MegaContador' href='https://megacontador.com.br/'>
                <img src='https://megacontador.com.br/img-boE33cDSy3WDhuZC-77.gif' border='0' alt='Contador de visitas'>
            </a>
        </div>

    </div>
</body>

</html>