<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CENTRAL 1.0</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="lib/chart-master/Chart.js"></script>



</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg"
            style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); color: #FFFFFF; box-shadow: 0 4px 15px rgba(0, 255, 204, 0.4);">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"
                    style="color: #FFFFFF;"></div>
            </div>
            <!--logo start-->
            <a href="painel.php" class="logo"
                style="color: #FFFFFF; text-shadow: 0 0 8px rgba(0, 255, 204, 0.8);"><b>CENTRAL 1.0</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#" style="color: #FFFFFF;">
                            <i class="fa fa-tasks"></i>
                            <span class="badge" style="background-color: #FFFFFF; color: #000;">1</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar"
                            style="background-color: #002b36; color: #FFFFFF; border: 1px solid #FFFFFF;">
                            <div class="notify-arrow" style="border-color: #FFFFFF;"></div>
                            <li>
                                <p class="green" style="color: #FFFFFF;">Olá, Bem vindos</p>
                            </li>
                            <li>
                                <a href="index.html#" style="color: #666666;">
                                    <div class="task-info">
                                        <div class="desc">Checkers Funcioando.</div>
                                        <div class="percent">11%</div>
                                    </div>
                                    <div class="progress progress-striped" style="background-color: #004d66;">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 100%; background-color: #00FF00;">
                                            <span class="sr-only">4% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" style="color: #FFFFFF;">Qualquer Error Contrate o Suporte...</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#" style="color: #FFFFFF;">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge" style="background-color: #FFFFFF; color: #000;">1</span>
                        </a>
                        <ul class="dropdown-menu extended inbox"
                            style="background-color: #002b36; color: #FFFFFF; border: 1px solid #FFFFFF;">
                            <div class="notify-arrow" style="border-color: #FFFFFF;"></div>
                            <li>
                                <p class="green" style="color: #FFFFFF;">Você tem uma mensagem do admin.</p>
                            </li>
                            <li>
                                <a href="index.html#" style="color: #FFFFFF;">
                                    <span class="photo"><img alt="avatar" src="img/L.k.jpg"></span>
                                    <span class="subject">
                                        <span class="from" style="color: #FFFFFF;">CENTRAL 1.0</span>
                                    </span>
                                    <span class="message">
                                        Esta gostando da central?
                                    </span>
                                </a>
                            </li>
                            <a href="index.html#" style="color: #FFFFFF;">Aproveite...</a>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#" style="color: #FFFFFF;">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning" style="background-color: #FFFFFF; color: #000;">1</span>
                        </a>
                        <ul class="dropdown-menu extended notification"
                            style="background-color: #002b36; color: #FFFFFF; border: 1px solid #FFFFFF;">
                            <div class="notify-arrow" style="border-color: #FFFFFF;"></div>
                            <li>
                                <p class="yellow" style="color: #FFFFFF;">Você tem 1 Notificação</p>
                            </li>
                            <li>
                                <a href="index.html#" style="color: #FFFFFF;">
                                    <span class="label label-danger" style="background-color: #ff0000;"><i
                                            class="fa fa-bolt"></i></span>
                                    Central em BETA
                                </a>
                            </li>
                            <a href="index.html#" style="color: #FFFFFF;">Aproveite...</a>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="index.php"
                            style="color: #FFFFFF; background-color: #004d66; border-radius: 5px;">SAIR</a></li>
                </ul>
            </div>
        </header>

        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse" tabindex="5000"
                style="overflow: hidden; outline: none; background: linear-gradient(135deg, #1b2735, #090a0f); border-right: 2px solid #FFFFFF; padding: 20px;">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion" style="display: block;">
                    <p class="centered">
                        <a href="painel.php">
                            <img src="https://i.ibb.co/vXrJnPK/4f61a50e-2fee-49c8-abbf-29d1b0d146c9.jpg"
                                class="img-circle" width="80"
                                style="border: 2px solid #FFFFFF; box-shadow: 0 0 10px rgba(0, 255, 204, 0.5);">
                        </a>
                    </p>
                    <h5 class="centered" style="color: #FFFFFF; text-shadow: 0 0 10px rgba(0, 255, 204, 0.7);">CENTRAL
                        1.0</h5>
                    <li class="mt">
                        <a class="active" href="painel.php" style="color: #FFFFFF;">
                            <i class="fa fa-dashboard" style="color: #FFFFFF;"></i>
                            <span>INÍCIO</span>
                        </a>
                    </li>
                    <li class="sub-menu dcjq-parent-li">
                        <a href="javascript:;" class="dcjq-parent" style="color: #FFFFFF;">
                            <i class="" style="color: #FFFFFF;"></i>
                            <span>CARTÃO DE CRÉDITO</span>
                            <span class="dcjq-icon"></span>
                        </a>
                        <ul class="sub" style="display: none; background: #0d1a26;">
                            <li><a class="" href="./checkers/CCGEN/index.php" style="color: #FFFFFF;">CCGEN
                                    🟢</a></li>
                    </li>
                    <li><a class="" href="./checkers/CHECKER ALLBINS/index.php" style="color: #FFFFFF;">CHECKER ALLBINS
                            🟢
                            1</a></li>
                    <li><a class="" href="./checkers/Gringo2/index.php" style="color: #FFFFFF;">finder Gringo 2
                            🔴</a></li>
                    <li><a class="" href="./checkers/gg/" style="color: #FFFFFF;">GG
                            🔴</a></li>
                    <li><a class="" href="./checkers/elo/" style="color: #FFFFFF;">ELO
                            🔴</a></li>
                    <li><a class="" href="./checkers/full/" style="color: #FFFFFF;">FULL
                            🔴</a></li>
                    <li><a class="" href="./checkers/elov2/" style="color: #FFFFFF;">ELO V2
                            🔴</a></li>
                    <li><a class="" href="./checkers/Chkamex/" style="color: #FFFFFF;">AMEX
                            🔴</a></li>
                </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent" style="color: #FFFFFF;">
                        <i class="" style="color: #FFFFFF;"></i>
                        <span>LOGINS/ASSINATURAS</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="" href="./checkers/wish/index.php" style="color: #FFFFFF;">Wish
                                🔴</a></li>
                        <li><a class="" href="./checkers/moip/index.php" style="color: #FFFFFF;">Moip
                                🔴</a></li>
                        <li><a class="" href=" ./checkers/bleze/" style="color: #FFFFFF;">BLAZE 🟢</a></li>
                        <li><a class="" href="./checkers/pagseguro/" style="color: #FFFFFF;">pagseguro
                                🔴</a></li>
                        <li><a class="" href="./checkers/netflix/" style="color: #FFFFFF;">Netflix
                                🔴</a></li>
                        <li><a class="" href="./checkers/assinatura/chk-spotify" style="color: #FFFFFF;">Spotify
                                🔴</a></li>
                        <li><a class="" href="./checkers/Sky/" style="color: #FFFFFF;">SKY 🔴</a>
                        </li>
                        <li><a class="" href="./checkers/centauro/" style="color: #FFFFFF;">Centauro 🟢</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent" style="color: #FFFFFF;">

                        <i class="" style="color: #FFFFFF;"></i>
                        <span>DETECT</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="" href="./checkers/americanas/" style="color: #FFFFFF;">americanas 🟢</a></li>
                        <li><a class="" href="./checkers/Ei Plus/" style="color: #FFFFFF;">Ei Plus 🟢</a></li>
                        <li><a class="" href="./checkers/renner/" style="color: #FFFFFF;">renner 🟢</a></li>
                        <li><a class="" href="./checkers/sendspace/" style="color: #FFFFFF;">sendspace 🟢</a></li>
                        <li><a class="" href="./checkers/chk-telecine/" style="color: #FFFFFF;">telecine
                                🔴</a></li>
                        <li><a class="" href="./checkers/chk-tufos" style="color: #FFFFFF;">TUFOS 🟢</a></li>
                        <li><a class="" href="./checkers/pontofrio/" style="color: #FFFFFF;">ponto frio
                                🔴</a></li>
                        <li><a class="" href="./checkers/submarino/" style="color: #FFFFFF;">submarino
                                🔴</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent" style="color: #FFFFFF;">
                        <i class="fa fa-tools" style="color: #FFFFFF;"></i>
                        <span>FERRAMENTAS</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="fa fa-tools" href="./checkers/gerardados" style="color: #FFFFFF;">GERARDADOS
                                🟢</a></li>
                    </ul>
                    </a>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="fa fa-tools" href="./checkers/Capturador de Dorks" style="color: #FFFFFF;">DORKS
                                🟢</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent" style="color: #FFFFFF;">
                        <i class="fa fa-tools" style="color: #FFFFFF;"></i>
                        <span>CONSULTAS</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="fa fa-tools" href="./checkers/cep" style="color: #FFFFFF;">CEP🟢</a></li>
                    </ul>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="fa fa-tools" href="./checkers/ip" style="color: #FFFFFF;">IP🟢</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent" style="color: #FFFFFF;">
                        <i class="fa fa-address-book" style="color: #FFFFFF;"></i>
                        <span>CONTATOS</span>
                        <span class="dcjq-icon"></span>
                    </a>
                    <ul class="sub" style="display: none; background: #0d1a26;">
                        <li><a class="fa fa-telegram" href="https://wa.me/5511918533460" style="color: #FFFFFF;">VENDAS
                                L.K</a></li>
                        <li><a class="fa fa-telegram" href="https://wa.me/5511918533460" style="color: #FFFFFF;">VENDAS
                                VULGO7</a></li>
                        <li><a class="fa fa-telegram" href="https://chat.whatsapp.com/B5GzX7v8dvaBx2lJGj4W8n"
                                style="color: #FFFFFF;">GRUPO CENTRAL 1.0</a></li>
                    </ul>
                </li>
                </ul>
                <!-- sidebar menu end-->
            </div>

        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row"
                    style="background: linear-gradient(135deg, #1b2735, #090a0f); padding: 20px; border-radius: 10px;">
                    <div class="col-lg-9 main-chart">
                        <!--CUSTOM CHART START -->
                        <div class="border-head" style="border-bottom: 2px solid #FFFFFF;">
                            <h3 style="color: #FFFFFF; text-shadow: 0 0 10px rgba(0, 255, 204, 0.7);">BEM VINDO(a)</h3>
                        </div>
                        <!-- DIRECT MESSAGE PANEL -->
                        <div class="col-md-8 mb">
                            <div class="message-p pn"
                                style="background-color: #000000; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 255, 204, 0.3);">
                                <div class="message-header"
                                    style="border-bottom: 1px solid #FFFFFF; padding-bottom: 1px;">
                                    <h5 style="color: #FF0000;">Mensagens Diretas.</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 centered hidden-sm hidden-xs">
                                        <img src="https://i.ibb.co/vXrJnPK/4f61a50e-2fee-49c8-abbf-29d1b0d146c9.jpg"
                                            class="img-circle" width="65" style="border: 2px solid #FFFFFF;">
                                    </div>
                                    <div class="col-md-9">
                                        <p style="color: #FFFFFF;">
                                            <name style="font-weight: bold;">CENTRAL 1.0</name> lhe enviou uma
                                            mensagem.
                                        </p>
                                        <p class="small" style="color: #FFFFFF;">Agora..</p>
                                        <p class="message" style="color: #FFFFFF;">Olá, bem-vindo à central</p>
                                        <form class="form-inline" role="form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputText"
                                                    placeholder="Responder"
                                                    style="border: 1px solid #FFFFFF; background-color: #002b36; color: #FFFFFF;">
                                            </div>
                                            <button type="submit" class="btn btn-default"
                                                style="background-color: #FFFFFF; color: #000;">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- USERS ONLINE SECTION -->
                    <!-- First Member -->
                    <div class="desc" style="margin-top: 20px;">
                        <div class="thumb">
                            <img class="img-circle"
                                src="https://i.ibb.co/vXrJnPK/4f61a50e-2fee-49c8-abbf-29d1b0d146c9.jpg" width="35px"
                                height="35px" style="border: 2px solid #FFFFFF;">
                        </div>
                        <p style="color: #FFFFFF; margin-left: 10px;">Usuário Online</p>
                    </div>
                </div>

                <!-- CALENDAR-->

                </div>
                <div id="my-calendar"></div>
                </div>
                </div>
                </div>
                <!-- / calendar -->
                </div>
                <!-- /col-lg-3 -->
                </div>
                <!-- /row -->
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->

        <footer class="site-footer"
            style="background: #000000; color: #fff; border-top: 5px solid #ff0000; padding: 50px;">
            <div class="text-center">
                <p style="color: #FFFFFF;">
                    © Todos direitos reservados <strong> CENTRAL 1.0 </strong> Coder L.K - VULGO7
                </p>

                <a href="index.html#" class="❔" style="color: #ff0000; text-decoration: none;">
                    <i class="❔" style="font-size: 20px; color: #ff0000;"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>

    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="lib/jquery.sparkline.js"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="lib/gritter-conf.js"></script>
    <!--script for this page-->
    <script src="lib/sparkline-chart.js"></script>
    <script src="lib/zabuto_calendar.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'bem-vindo a Central!',
            // (string | mandatory) the text inside the notification
            text: 'Olá, Central em desenvolvimento Dono L.k Vulgo7',
            // (string | optional) the image to display on the left
            image: 'https://i.ibb.co/vXrJnPK/4f61a50e-2fee-49c8-abbf-29d1b0d146c9.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 15000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
    </script>

</body>

</html>