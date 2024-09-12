<?php header("Content-Type: text/html; charset=utf-8"); session_start(); 
include_once("../verifica_login.php");
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>ELO</title>
    <style>
    body {
        background-color: blue;
        color: white;
    }
    </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
.fontclass {
    color: #6c8f24;
    font-family: 'Poppins', sans-serif;
}

.fontclass:hover {
    transition: all .3s linear;
    -moz-transition: all .3s linear;
    -webkit-transition: all .3s linear;
    color: #7FFF00;
    text-shadow: 0 0 12px #6c8f24;
}

textarea {
    font-family: 'Baloo Paaji', cursive;
    text-align: center;
    background-color: transparent;
    color: white;
    border: none;
    border-bottom: 6px solid #6c8f24;
    border-top: 6px solid #6c8f24;
    border-right: 1px solid #6c8f24;
    border-left: 1px solid #6c8f24;
    background-color: live;
    font-size: 15px;
    width: 730px;
    height: 200px;
}

textarea:hover {
    transition: all .2s linear;
    -moz-transition: all .2s linear;
    -webkit-transition: all .2s linear;
    background-color: transparent;
    color: #9370DB;
    border: none;
    border-bottom: 6px solid #9370DB;
    border-top: 6px solid #9370DB;
    border-right: 1px solid #9370DB;
    border-left: 1px solid #9370DB;
    font-size: 15px;
    width: 750px;
    height: 200px;
    box-shadow: 0px 0px 19px #9370DB;
    -webkit-box-shadow: 0px 0px 19px #9370DB;
    -moz-box-shadow: 0px 0px 19px #9370DB;
}

.trashedRes {
    font-family: 'Baloo Paaji', cursive;
    text-align: center;
    background-color: transparent;
    color: green;
    border: none;
    border-bottom: 6px solid #9370DB;
    border-top: 6px solid #9370DB;
    border-right: 1px solid #9370DB;
    border-left: 1px solid #9370DB;
    background-color: live;
    font-size: 15px;
    width: 730px;
    height: 150px;
    overflow-x: scroll;
}

.BotãoChecar {

    background-color: #9370DB;
    border: none;
    color: white;
    padding: 8px 14px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;

}

.BotãoChecar:hover {

    transition: all .2s linear;
    -moz-transition: all .2s linear;
    -webkit-transition: all .2s linear;
    background-color: #8A2BE2;
    border: none;
    color: white;
    padding: 8px 14px;
    border: none;
    border-bottom: 2px solid #8A2BE2;
    border-right: 2px solid #8A2BE2;
    border-top: 2px solid #8A2BE2;
    border-left: 2px solid #8A2BE2;
    box-shadow: 0px 0px 9px #8A2BE2;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;

}
</style>
<script title="ajax do checker">
$(document).ready(function() {
    $('#iniciar').click(function() {
        if (!$('#lista').val()) {
            document.getElementById('iniciar').innerHTML = 'Lista vazia!';
        } else if (!$('#key').val()) {
            document.getElementById('iniciar').innerHTML = 'Insira sua key mp!';
        } else {
            var apv = 0;
            var rpd = 0;
            var testadas = 0;
            var token;
            token = document.getElementById('key').value;
            var line = $('#lista').val();
            line = line.split("\n");
            var total = line.length;
            $("#total").html(total);
            line.forEach(function(value, index) {
                document.getElementById('iniciar').innerHTML = "Testando.";
                $.ajax({
                    url: 'api.php',
                    type: 'GET',
                    data: 'lista=' + value + '&token=' + token,
                    success: function(data) {
                        var json = JSON.parse(data);
                        var msg = json.msg;
                        switch (json.status) {
                            case 0:
                                removelinha();
                                $("#Aprovada").append(msg);
                                testadas = testadas + 1;
                                apv = apv + 1;
                                break;
                            case 1:
                                removelinha();
                                $("#Reprovada").append(msg);
                                testadas = testadas + 1;
                                rpd = rpd + 1;
                                break;
                        }

                        var fila = parseInt(apv) + parseInt(rpd);
                        $("#apv").html(apv);
                        $("#rpd").html(rpd);
                        $("#testadas").html(testadas);
                        titulo('[' + $('#testadas').text() + '/' + $('#total')
                        .text() + '] Mercado Pago');

                        if (fila == total) {
                            $("#iniciar").attr('disabled', null);
                            $("#lista").attr('disabled', null);
                            document.getElementById("iniciar").innerHTML =
                                "Teste Finalizado!";
                        }
                    }
                });
            });
        } // aq
    });
});

function titulo(text) {
    document.title = text;
}

function removelinha() {
    var lines = $("#lista").val().split('\n');
    lines.splice(0, 1);
    $("#lista").val(lines.join("\n"));
}
</script>

<body>
    <center>
        <h1>elo by alex</h1>
        <textarea name="lista" id="lista" rows="7" placeholder="Carregue suas lata!"
            style="margin: 0px; width: 40%;px; height: 132px;"></textarea><br /><br />
        <input type="text" name="key" id="key" style="width: 40%;" placeholder="Insira sua key mp" /> <br /><br />

        <div>
            <span>Aprovadas: </span><span id="apv">0</span>
            <span>Reprovadas: </span> <span id="rpd">0</span>
            <span>Testadas: </span> <span id="testadas">0</span>
            <span>Carregadas: </span> <span id="total">0</span>
        </div>
        <br>
        <div>
            <button type="button" name="iniciar" id="iniciar" style="width:15%;">Iniciar </button>
        </div>
        <br>
        <div>
            Aprovada
            <button type="button" onclick="document.getElementById('Aprovada').innerHTML = ''"> - Limpar</button>
            <h4 id="Aprovada"></h4>
        </div>

        <div>
            Reprovada
            <button type="button" onclick="document.getElementById('Reprovada').innerHTML = ''"> - Limpar</button>
            <h4 id="Reprovada"></h4>
        </div>
    </center>
</body>

</html>