<center>
    <title>Capturador de Dorks</title>
    <style type="text/css">
    /*
*/
    * {
        padding: 0;
        margin: 0;
    }

    html,
    body {
        background: url(https://pcbx.us/bexy.jpg);

        font-family: "Lato", sans-serif;

        animation: fadein 3s;

    }

    @keyframes fadein {
        from {
            opacity: 0
        }

        to {
            opacity: 1
        }
    }

    body {
        height: 100%;
    }

    input[type='text'] {
        width: 200px;
        height: 28px;
        border: 1px solid #164eda;
        background: #aabff6;
        outline: none;
        color: #F0F0F0;
    }

    .btn {
        width: 160px;
        height: 30px;
    }

    .btn-search {
        background: #aabff6;
        color: #164eda;
        border: 1px solid #164eda;
        outline: none;
        border-radius: 3px;
    }

    .btn-search:hover {
        background: #164eda;
        color: #F0F0F0;
        cursor: pointer;
    }

    /* Personalização */
    .position {
        width: 60px;
        text-align: center;
        /*border: 1px solid #f0f0f0; */
    }

    .status {
        width: 110px;
        text-align: center;
        /*border: 1px solid #f0f0f0; */
    }

    .url {
        width: 260px;
        text-align: center;
        /*border: 1px solid #f0f0f0; */
    }

    .positionvalue {
        text-align: center;
        background: #424242;
    }

    .statusvalue {
        width: 60px;
        height: 26px;
        text-align: center;
    }

    .aprovado {
        background: #069506;
    }

    .reprovado {
        background: #df1414;
    }

    .urlvalue {
        text-align: center;
        background: #424242;
    }

    .urlvalue a {
        color: #F0F0F0;
        text-decoration: none;
    }

    .urlvalue a:hover {
        color: #9db4ef;
        text-decoration: underline;
    }
    </style>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />

    <body>
        <center>
            <h1>
                <center>️ Capturador de Dorks CENTRAL 1.0<br></center>
            </h1>
            <h4>
                <center>Numero de dorks: </center>
            </h4>
            </br>

            <form action="" method="POST">
                <span> Quantidade: </span>
                <input type="text" id="text" name="text" placeholder="Digite um quantidade" />
                <button type="submit" name="att" class="btn btn-search"> <i class="fa fa-search"></i> Procurar </button>

            </form>
            </br>
        </center>
    </body>
    <?php

    error_reporting(0);

    if (isset($_POST['att'])) {

        $quant = $_POST['text'];

        //Palavras Chave
        $name = array('pagina', 'index', 'carrinho', 'cadastro', 'login', 'produto', 'detalhes', 'loja', 'pagamento', 'pagar', 'formas-de-pagamento', 'produtos-detalhes', 'categoria', 'colunas', 'noticias', 'emprego', 'galerias', 'produtos_ver', 'home', 'detalhesproduto', 'viagem', 'revista', 'tempo', 'imoveis', 'comprar', 'visualizar', 'restaurante', 'roupas', 'hoteis', 'exibirmarca', 'evento_detalhe', 'boutique', 'shopping');
        $params = array('id', 'cat');


        for ($i = 0; $i < $quant; $i++) {
            $dork = 'inurl: ' . $name[rand(0, count($name))] . '.php?' . $params[rand(0, 2)] . '=';
            echo '<center>' . $dork . ' <br>';
        }
    }


    ?>