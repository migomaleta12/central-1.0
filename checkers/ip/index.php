<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="Niklausec">
    <title>CONSULTA CEP</title>
    <link rel="apple-touch-icon" href="../../theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/logo/logo.png">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    body {
        background: linear-gradient(45deg, #1c1c1c, #2a2a2a, #3a3a3a);
        background-size: 600% 600%;
        animation: gradient 10s ease infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 0%;
        }

        50% {
            background-position: 100% 100%;
        }

        100% {
            background-position: 0% 0%;
        }
    }

    .container {
        background: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        padding: 20px;
    }

    .card {
        background: rgba(0, 0, 0, 0.6);
        border-radius: 10px;
    }

    .text-light {
        color: #e0e0e0 !important;
    }

    .btn-light {
        background: #333;
        color: #fff;
        border: none;
    }

    .btn-light:hover {
        background: #444;
    }

    .badge-warning {
        background: #ffcc00;
        color: #000;
    }

    .badge-dark {
        background: #222;
        color: #fff;
    }

    .badge-success {
        background: #28a745;
        color: #fff;
    }

    .badge-danger {
        background: #dc3545;
        color: #fff;
    }

    .badge-primary {
        background: #007bff;
        color: #fff;
    }

    .badge-info {
        background: #17a2b8;
        color: #fff;
    }
    </style>
</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" style="background: #0f1321;"
    data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <div class="container mt-4" style="margin-bottom: 100px;">

        <div class="text-center mb-3">

            <h1 class="text-light"><b>CONSULTA IP</b></h1>
            <h class="text-light"><b>
                    <p>👹CENTRAL 1.0👹</p>
                </b></h>
            <h class="text-light"><b><span class='badge badge-dark'></span></b></h>

            <fieldset class="form-group">
                <textarea class="form-control bg-dark text-light" style="resize: none;text-align: center;margin: auto;"
                    rows="5" id="lista" placeholder=""></textarea>
            </fieldset>

            <div class="mb-3">
                <button type="button" class="btn btn-light btn-min-width mr-1 mb-1" id="testar"
                    onclick="enviar()">INICIAR</button>
                <button type="button" class="btn btn-light btn-min-width mr-1 mb-1" id="parar"
                    disabled="true">PARAR</button>
                <a href="../../" class="btn btn-primary btn-min-width mr-1 mb-1">VOLTAR</a>
            </div>

            <div class="badge badge-success badge-pill" style="padding: 10px 10px;margin: 5px;">
                <i class="la la-check"></i>
                <span style="font-size: 15px;"> Aprovados</span>
                <span style="font-size: 15px;" id="cLive">0</span>
            </div>

            <div class="badge badge-danger badge-pill" style="padding: 10px 10px;margin: 5px;">
                <i class="la la-close"></i>
                <span style="font-size: 15px;"> Reprovados</span>
                <span style="font-size: 15px;" id="cDie">0</span>
            </div>

            <div class="badge badge-primary badge-pill" style="padding: 10px 10px;margin: 5px;">
                <i class="la la-clock-o"></i>
                <span style="font-size: 15px;"> Testados</span>
                <span style="font-size: 15px;" id="total">0</span>
            </div>

            <div class="badge badge-info badge-pill" style="padding: 10px 10px;margin: 5px;">
                <i class="la la-cloud-upload"></i>
                <span style="font-size: 15px;"> Carregados</span>
                <span style="font-size: 15px;" id="carregadas">0</span>
            </div>

            <div class="text-center text-light mt-3">
                <h4 class="text-light" id="status_ccs">AGUARDANDO INICIO</h4>
            </div>

            <div class="col-md-12 mt-3 p-0">
                <div class="card bg-dark text-light">
                    <div style="position: absolute;top: 0;right: 0;">
                        <button id="mostra" class="btn btn-primary" style="padding: 2px 5px;"><i
                                class="la la-external-link-square" style="font-size: 30px;"></i></button>
                    </div>
                    <div class="card-body">
                        <h6 style="font-weight: bold;" class="card-title text-light">Aprovados - <span id="cLive2"
                                class="badge badge-success">0</span></h6>
                        <div id="bode"><span id=".aprovadas" class="aprovadas"></span></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 p-0">
                <div class="card bg-dark text-light">
                    <div style="position: absolute;top: 0;right: 0;">
                        <button id="mostra2" class="btn btn-primary" style="padding: 2px 5px;"><i
                                class="la la-external-link-square" style="font-size: 30px;"></i></button>
                    </div>
                    <div class="card-body">
                        <h6 style="font-weight: bold;" class="card-title text-light">Reprovados - <span id="cDie2"
                                class="badge badge-danger">0</span></h6>
                        <div id="bode"><span id=".reprovadas" class="reprovadas"></span></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 p-0">
                <div class="card bg-dark text-light">
                    <div style="position: absolute;top: 0;right: 0;">
                        <button id="mostra3" class="btn btn-primary" style="padding: 2px 5px;"><i
                                class="la la-external-link-square" style="font-size: 30px;"></i></button>
                    </div>
                    <div class="card-body">
                        <h6 style="font-weight: bold;" class="card-title text-light">Carregadas - <span id="carregadas2"
                                class="badge badge-info">0</span></h6>
                        <div id="bode"><span id=".carregadas" class="carregadas"></span></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 p-0">
                <div class="card bg-dark text-light">
                    <div style="position: absolute;top: 0;right: 0;">
                        <button id="mostra4" class="btn btn-primary" style="padding: 2px 5px;"><i
                                class="la la-external-link-square" style="font-size: 30px;"></i></button>
                    </div>
                    <div class="card-body">
                        <h6 style="font-weight: bold;" class="card-title text-light">Testados - <span id="total2"
                                class="badge badge-primary">0</span></h6>
                        <div id="bode"><span id=".testados" class="testados"></span></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
    // JavaScript functions and event handlers go here
    function enviar() {
        // Logic to handle the "INICIAR" button click
    }

    // Additional JavaScript code
    </script>

</body>

</html>


</div>
<!-- BEGIN VENDOR JS-->
<script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CHAMELEON  JS-->
<script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
<script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
<!-- END CHAMELEON  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script type="text/javascript">
$(document).ready(function() {
    $("#bode").hide();
    $("#esconde").show();
    $('#mostra').click(function() {
        $("#bode").slideToggle();
    });
});
$(document).ready(function() {
    $("#bode2").hide();
    $("#esconde2").show();
    $('#mostra2').click(function() {
        $("#bode2").slideToggle();
    });
});

// set audios vars.
var audioLive = new Audio('liv.mp3');


function enviar() {
    var linha = $("#lista").val();
    var linhaenviar = linha.split("\n");
    var total = linhaenviar.length;
    var ap = 0;
    var rp = 0;
    $('#testar').attr('disabled', 'disabled');
    $('#parar').attr('disabled', null);
    linhaenviar.forEach(function(value, index) {
        setTimeout(
            function() {
                var ajaxCall = $.ajax({
                    url: 'api.php?lista=' + value,
                    type: 'GET',
                    async: true,
                    success: function(resultado) {
                        if (resultado.match("ENCONTRADO")) {
                            removelinha();
                            ap++;
                            aprovadas(resultado + "");
                            audioLive.play();
                            $('#status_ccs').html('LIVE');
                        } else {
                            removelinha();
                            rp++;
                            reprovadas(resultado + "");
                            $('#status_ccs').html('DIE');
                        }
                        $('#carregadas').html(total);
                        var fila = parseInt(ap) + parseInt(rp);
                        $('#cLive').html(ap);
                        $('#cDie').html(rp);
                        $('#total').html(fila);
                        $('#cLive2').html(ap);
                        $('#cDie2').html(rp);

                        if (fila == total) {
                            $('#testar').attr('disabled', null);
                            $('#parar').attr('disabled', 'disabled');
                            $('#lista').attr('disabled', null);
                            // audio.play();
                            document.getElementById("status_ccs").innerHTML =
                                "FINALIZADO";
                            setTimeout(function() {
                                document.getElementById("status_ccs")
                                    .innerHTML = "AGUARDANDO INICIO...";
                            }, 2000);
                        }
                    }
                });
                $('#parar').click(function() {
                    ajaxCall.abort();
                    $('#testar').attr('disabled', null);
                    $('#parar').attr('disabled', 'disabled');
                    $('#lista').attr('disabled', null);
                    var st = 'PAUSADO';
                    $('#status_ccs').html(st);
                });
            }, 20 * index);

    });
}

function aprovadas(str) {
    $(".aprovadas").prepend(str + "<br>");
}

function reprovadas(str) {
    $(".reprovadas").prepend(str + "<br>");
}

function removelinha() {
    var lines = $("#lista").val().split('\n');
    lines.splice(0, 1);
    $("#lista").val(lines.join("\n"));
}
</script>
<center>
    <h2 class="text-light"><b><span class='badge badge-danger'>👹CENTRAL 1.0👹 2024</span></b></h2>
</center><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
<center>
    <h class="text-light"><b></b></h>
</center>
</body>

</html>