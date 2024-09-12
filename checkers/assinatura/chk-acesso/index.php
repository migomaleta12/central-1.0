<?php header("Content-Type: text/html; charset=utf-8"); session_start(); 
include_once("../verifica_login.php");
 ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>[CHK-ACESSO] - chk</title>
    <link rel="icon" href="imagem/blur.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content=Fox-Checkers." name="description">
    <meta content="NOISENOIS" name="author">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/minty/bootstrap.min.css" rel="stylesheet" integrity="sha384-Qt9Hug5NfnQDGMoaQYXN1+PiQvda7poO7/5k4qAmMN6evu0oDFMJTyjqaoTGHdqf" crossorigin="anonymous">
    <style>
       body{
       background: url('blur.jpg') no-repeat center center fixed;
       background-size: cover;
       -webkit-background-size: cover; /* SAFARI / CHROME */
       -moz-background-size: cover; /* FIREFOX */
       -ms-background-size: cover; /* IE */
       -o-background-size: cover; /* OPERA */
       }
        h1{
            font-family: 'Press Start 2P', cursive;
            color: tranparent;
        }
        textarea{
            margin-top: 0px; margin-bottom: 0px; height: 149px;
            background: transparent;
            color: pink;
            text-align: center;
            font-size: 30px;
            width: 60%;
            resize: none;
            outline: none;
        }
        #list{
            resize: none;
        }
        .nav.nav-tabs + .tab-content {
            background: #ffffff;
            margin-bottom: 30px;
            padding: 30px;
        }

        .tabs-vertical-env .tab-content {
            background: #ffffff;
            display: table-cell;
            margin-bottom: 30px;
            padding: 30px;
            vertical-align: top; 
        }

        .search-result-box .tab-content {
            padding: 30px 30px 10px 30px;
            box-shadow: none; }
     

    </style>
</head>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
        var audio = new Audio('blop.mp3');
            $(document).ready(function () {
                $('#status').html('<span id="bad" class="badge badge-danger">Não iniciado !</span>');               
                $('#start').attr('disabled', null);
                
                $('#clear').attr('disabled','disabled');
                $('#stop').attr('disabled','disabled');
                $('#start').click(function () {
                    audio.play();
                    var line = $('#list').val().split('\n');
                    var total = line.length;
                    var ap = 0;
                    var rp = 0;
                    var sd = 0;
                    $('#total').html(total);
                    line.forEach(function (value, index) {
                        
                        var ajaxCall = $.ajax({
                            
                            url: 'api.php',
                            type: 'GET',
                            data: 'lista=' + value,
                            beforeSend: function () {
                                $('#status').html('<span class="badge badge-success">Testando !</span>');
                                $('#stop').attr('disabled',null);
                                $('#stop').attr('disabled',null);
                                $('#start').attr('disabled','disabled');
                            },

            success: function(data){
                if(data.indexOf("Aprovada") >= 0){
                    $("#aprovadas").val(data + "\n" + $("#aprovadas").val());
                    ap = ap + 1;
                    document.getElementById("aprovadas").innerHTML += data + "<br>";
                    audio.play();
                    removelinha();
                }else{
                    $("#reprovadas").val(data + "\n" + $("#reprovadas").val());
                    rp = rp + 1;
                    document.getElementById("reprovadas").innerHTML += data + "<br>";
                    removelinha();
                }
                    var fila = parseInt(ap) + parseInt(rp);
                    $('#live').html(ap);
                    $('#die').html(rp);
                    $('#testadas').html(fila);
                    if (fila == total) {
                        $('#start').attr('disabled', null);
                        $('#stop').attr('disabled', 'disabled');
                        $('#clear').attr('disabled',null);
                        $('#status').html('<span class="badge badge-info">Teste Finalizado !</span>');
                        audio.play();
                    }
                }
            });
             $('#stop').click(function(){
            ajaxCall.abort();
            $('#start').attr('disabled',null);
            $('#stop').attr('disabled','disabled');
            $('#clear').attr('disabled',null);
          });
        });
        $('#stop').click(function(){
          $('#status').html('<span class="badge badge-danger">Parado !</span>');
          
        });
        
        $('#clear').click(function(){
        $('#status').html('<span class="badge badge-secondary">Lista Limpa!</span>');
                $('#list').val('');
            });
            });
        });
        function removelinha() {
            var lines = $("#list").val().split('\n');
                lines.splice(0, 1);
                $("#list").val(lines.join("\n"));
            }  

        </script>
<body>
    <center><br>
        <div class="checker">
            <div class="info-checker">
                <h1 style="font-family: 'Righteous', cursive; color: blue;"</i> Checker Acesso</i></h1>
              
              
            </div>
    <textarea id="list" name="lista" rows="5" required="" cols="1" style="max-width: 100rem;" class="form-control" placeholder="DIGITE AQUI"></textarea><p></p>
    <div>
        <font color="blue"><b>Status: </b><span id="status"></span><p></p>Aprovadas : <span id="live" class="badge badge-success">0</span>  Reprovadas : <span id="die" class="badge badge-danger">0</span> Testadas: <span id="testadas" class="badge badge-warning">0</span>  Total : <span id="total" class="badge badge-light">0</span> </font><br><br>
    </div>

<div class="button-list">
    <button class="btn btn-success" type="submit" id="start"><i class="fas fa-play"></i>&nbsp;Iniciar</button>
    <button class="btn btn-danger" type="submit" id="stop"><i class="fas fa-pause"></i>&nbsp;Pausar</i></button>
    <button class="btn btn-primary" type="clear" id="clear"><i class="far fa-trash-alt"></i>&nbsp;Limpar</i></button>
</div>
<center>
    <div class="" style="max-width: 50rem;">
                <div style="background-color: #56CC9D; color: green;" class="card-header">APROVADAS</div>
                <div id="aprovadas" class="card-body">
                </div>
            </div>

     <div class="" style="max-width: 50rem;">
                <div style="background-color: #FF7851; color: green;" class="card-header">REPROVADAS</div>
                <div id="reprovadas" class="card-body">
                   <tbody id="reprovadas"></tbody>
                </div>
     </div>
</center>
</body>
</html>