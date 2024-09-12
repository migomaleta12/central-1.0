<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
include_once("../verifica_login.php");
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="NuncaNemVi">
    <title>[CHK Centauro]</title>
    <link rel="icon" type="image/png" sizes="16x16"
        href="../../bootstraplogos.com/wp-content/uploads/edd/2018/04/logo-3.png">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
    <!-- END CHAMELEON  CSS-->
    <style>
    body {
        background: linear-gradient(120deg, #00ffff, #8a2be2, #00ff00);
        color: #FFFFFF;
        font-family: 'Muli', sans-serif;
    }

    h3.content-header-title,
    h4.card-title {
        color: #ff6f61;
        font-weight: bold;
    }

    .card {
        background-color: #1c1c1c;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        border: 1px solid #ff6f61;
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

    #iniciarchk {
        background-color: #00ff00;
        border-color: #00ff00;
        color: #1c1c1c;
        font-weight: bold;
    }

    #pararchk {
        background-color: #ff0033;
        border-color: #ff0033;
        color: #1c1c1c;
        font-weight: bold;
    }

    .btn-outline-primary {
        border-color: #00ccff;
        color: #00ccff;
    }

    .btn-outline-primary:hover {
        background-color: #00ccff;
        color: #1c1c1c;
    }

    #lista_ccs {
        background-color: #333333;
        color: #00ff00;
        font-weight: bold;
        border: 1px solid #00ff00;
    }
    </style>
</head>
<script src="ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="app-assets/js/checker.js" type="text/javascript"></script>

<body class="vertical-layout" data-color="bg-gradient-x-purple-blue">
    <center>
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-wrapper-before"></div>
                <div class="content-header row">
                    <div align='left' class="content-header-left col-md-4 col-12 mb-2">
                        <h3 class="content-header-title">Checker Centauro</h3>
                    </div>
                </div>
                <div class="content-body">
                    <section>
                        <div class="row match-height">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-form" align='left'>STATUS: <span
                                                id="status_ccs">Pausado...</span></h4>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form class="form">
                                                <div class="form-body">
                                                    <textarea
                                                        style="font-size: 100%; height: 208px; text-align:center; width:100%;resize:none;outline:none;overflow: hidden;"
                                                        class="form-control" align='left' rows="4" id="lista_ccs"
                                                        placeholder="email e senha"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title" align='left'>INFORMAÇÕES</h4>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <span>APROVADAS:</span>&nbsp;<span id="lives_ccs"
                                                class="badge badge-success">0</span><br><br>
                                            <span>REPROVADAS:</span>&nbsp;<span id="dies_ccs"
                                                class="badge badge-danger"> 0</span><br><br>
                                            <span>TESTADAS:</span>&nbsp;<span id="testado_ccs"
                                                class="badge badge-info">0</span><br><br>
                                            <span>CARREGADAS:</span>&nbsp;<span id="total_ccs"
                                                class="badge badge-dark">0</span><br>
                                        </div>
                                        <button style="width:30%;" id="iniciarchk" type="button"
                                            class="btn waves-effect waves-light">Iniciar</button>
                                        <button style="width:30%;" id="pararchk" type="button" disabled=""
                                            class="btn waves-effect waves-light">Parar</button>
                                        <button style="width:30%;" onclick="javascript:limpar();" type="button"
                                            class="btn waves-effect waves-light btn-outline-primary">Limpar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="col-md-15">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" align='left'>Aprovadas -&nbsp;<span id="lives_cs"
                                            class="badge badge-success">0</span></h4>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div align='left' id="aprovadas"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-15">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" align='left'>Reprovadas -&nbsp;<span id="dies_cs"
                                            class="badge badge-danger">0</span></h4>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div align='left' id="reprovadas"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-15">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" align='left'>Resultado -&nbsp;<span id="falhas_cs"
                                            class="badge badge-info">0</span></h4>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div align='left' id="falhas"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </center>
</body>
<script>
$(document).on("keypress", function(e) {
    if (e.which == 13) {
        $("#iniciarchk").click();
    }
});
</script>

</html>