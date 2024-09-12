<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
include_once("../verifica_login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="NuncaNemVi">
    <title>Checker Sendspace</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../bootstraplogos.com/wp-content/uploads/edd/2018/04/logo-3.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
    body {
        background: linear-gradient(120deg, #00ffff, #8a2be2, #00ff00);
        color: #FFFFFF;
        font-family: 'Muli', sans-serif;
    }

    .card {
        background-color: #1c1c1c;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        border: 1px solid #ff6f61;
        margin: 20px;
        padding: 20px;
    }

    .card-header {
        background-color: #ff6f61;
        border-bottom: 3px solid transparent;
        color: #1c1c1c;
        padding: 10px;
    }

    .form-control {
        background-color: #333333;
        color: #00ff00;
        border: 1px solid #00ff00;
        resize: none;
        outline: none;
    }

    .btn {
        font-weight: bold;
        border-radius: 5px;
        padding: 10px;
        color: #1c1c1c;
        border: none;
        cursor: pointer;
        transition: all .3s ease-in-out;
    }

    #iniciarchk {
        background-color: #00ff00;
        border-color: #00ff00;
    }

    #pararchk {
        background-color: #ff0033;
        border-color: #ff0033;
    }

    .btn:hover {
        color: #FFFFFF;
    }

    .badge-success {
        background-color: #00ff00;
        color: #1c1c1c;
        font-weight: bold;
    }

    .badge-danger {
        background-color: #ff0033;
        color: #1c1c1c;
        font-weight: bold;
    }

    .badge-info {
        background-color: #00ccff;
        color: #1c1c1c;
        font-weight: bold;
    }

    .badge-dark {
        background-color: #666666;
        color: #FFFFFF;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Checker Sendspace</h3>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="row match-height">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dados para Testar</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <textarea class="form-control" id="text" rows="10" placeholder="Email|Senha"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informações</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <span>Aprovadas:</span>&nbsp;<span id="aprovada_conta" class="badge badge-success">0</span><br><br>
                                        <span>Reprovadas:</span>&nbsp;<span id="reprovada_conta" class="badge badge-danger">0</span><br><br>
                                        <span>Testadas:</span>&nbsp;<span id="testado" class="badge badge-info">0</span><br><br>
                                        <span>Carregadas:</span>&nbsp;<span id="total_ccs" class="badge badge-dark">0</span><br><br>
                                        <button id="iniciarchk" type="button" class="btn">Iniciar</button>
                                        <button id="pararchk" type="button" class="btn" disabled>Parar</button>
                                        <button onclick="javascript:limpar();" type="button" class="btn btn-outline-primary">Limpar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Aprovadas -&nbsp;<span id="lives_cs" class="badge badge-success">0</span></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div id="aprovadas"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reprovadas -&nbsp;<span id="dies_cs" class="badge badge-danger">0</span></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div id="reprovadas"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Resultado -&nbsp;<span id="falhas_cs" class="badge badge-info">0</span></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div id="falhas"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
    function start() {
        var i;
        var tudo = $('#text').val();
        var linha = tudo.split("\n");
        var separador = "|";
        for (i = 0; i < linha.length; i++) {
            var separado = linha[i];
            var id = i;
            check(separado, separador, id);
        }
    }

    var aps = 0;
    var rps = 0;
    var testadas = 0;

    function check(separado, separador, id) {
        setTimeout(function() {
            $.ajax({
                type: 'GET',
                url: 'net.php',
                dataType: 'html',
                data: {
                    'linha': separado
                },
                success: function(msg) {
                    ++testadas;
                    document.getElementById('testado').innerText = testadas;
                    if (msg.indexOf("REPROVADA") >= 0) {
                        var reprovadas2 = $("#resultado2").val();
                        ++rps;
                        document.getElementById('reprovada_conta').innerText = rps;
                        $("#resultado2").val(reprovadas2 + msg + "\n")
                    } else {
                        var reprovadas = $("#resultado").val();
                        ++aps;
                        document.getElementById('aprovada_conta').innerText = aps;
                        $("#resultado").val(reprovadas + msg + "\n")
                    }
                }
            });
        }, id * 1000);
    }

    $(document).on("keypress", function(e) {
        if (e.which == 13) {
            $("#iniciarchk").click();
        }
    });
    </script>
</body>

</html>
