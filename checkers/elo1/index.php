<?php header("Content-Type: text/html; charset=utf-8"); session_start(); 
include_once("../verifica_login.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CHK ELO</title>

   <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

  <link href="https://bootswatch.com/4/pulse/bootstrap.min.css" rel="stylesheet">
  <link href="https://bootswatch.com/4/pulse/bootstrap.css" rel="stylesheet">
  <link href="https://bootswatch.com/4/pulse/_variables.scss" rel="stylesheet">
  <link href="https://bootswatch.com/4/pulse/_bootswatch.scss" rel="stylesheet">

      <!-- Scripts -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>    
   
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>

<body>
<style>
	body{
		background-color: black;
		font-family: Poppins;
	}
</style>
<center>

        <br><h1 style="color: dark;" class="btn btn-danger ">CHK</h1><br>
        <h1 style="color: dark;" class="btn btn-danger ">ELO</h1><br>
		<h5 class="btn btn-danger ">@FOXSSH</h5>
<br>
<div class="md-form amber-textarea active-amber-textarea-2">

       <textarea id="lista" class="md-textarea form-control" rows="3" style="width: 720px;height: 200px;resize: none;background-color: transparent;border: 3px solid dark;color: silver; "></textarea>
</div>
<br>

    <font color="white">Status: <span id="status" class="badge badge-pill badge-dark ">Parado.</span>   Aprovadas: <span   id="aprovadas_contar" class="badge badge-pill badge-dark ">0</span>  Reprovadas: <span  id="reprovadas_contar" class="badge badge-pill badge-dark ">0</span>  Testadas: <span  id="testadas" class="badge badge-pill badge-dark ">0</span>  Total: <span  id="carregadas" class="badge badge-pill badge-dark " >0</span></font>

<br><br>

       <button id="iniciar" type="button" class="btn btn-outline-success" data-toggle="button" aria-pressed="false" autocomplete="off">Iniciar</button>
       <button id="parar" type="button" class="btn btn-outline-danger " data-toggle="button" aria-pressed="false" autocomplete="off">Parar</button>
	        <button onclick="history.go(-1);" class="btn btn-outline-warning ">voltar</button>


            <br><br><br>
           <div class="card text-white bg-secondary mb-3" style="max-width: 60rem;">
           <div class="card-header">Aprovadas</div>
           <p class="card-text"><div id="aprovadas"><br></p></div></div>
          <div class="card text-white bg-dark mb-3" style="max-width: 60rem;">Reprovadas
            <p class="card-text"><div id="reprovadas"><br></p></div></div>


<center>

</body>

              <!-- Script Feita Por Fatality Seu Deus -->

<script title="Fatality Seu Deus">

                $(document).ready(function () {

                $('#iniciar').attr('disabled', null);
                $('#iniciar').click(function () {
                $('#iniciar').attr('disabled', 'disabled');
                                        var line = $('#lista').val().replace(',', '').split('\n');
                    line = line.filter( function( item, index, inputArray ) {
                    return inputArray.indexOf(item) == index;
                    });
                                        var total = line.length;
                    var ap = 0;
                    var rp = 0;
                    var testadu = 0;
                    $('#status').html("Iniciado.");
                    $('#carregadas').html(total);
                    $("#lista").val(line.join("\n"));
                    $('#lista').attr('disabled', 'disabled');
                    $('#parar').attr('disabled', null);
                    line.forEach(function (value) {
                        if (value == "") {
                            removelinha();
                            return;

                        }
                        var ajaxCall = $.ajax({
                            url: 'api.php',
                            type: 'GET',
                            data: 'lista=' + value,
                            success: function (data) {
                                var status = data.includes("Aprovada");
                                if (status) {
                                removelinha();
                                $('#status').html("Aprovada.");
                                 document.getElementById("aprovadas").innerHTML += data + "<br>";
                                                                    testadu = testadu + 1;
                                    ap = ap + 1;
                                }else{
                            
                                     removelinha();
                                     $('#status').html("Reprovada.");
                                     document.getElementById("reprovadas").innerHTML += data + "<br>";
                                                                        testadu = testadu + 1;
                                    rp = rp + 1;
                                }
                                var fila = parseInt(ap) + parseInt(rp);
                                $('#aprovadas_contar').html(ap);
                                $('#reprovadas_contar').html(rp);
                                $('#testadas').html(fila);

                                if (fila == total) {
                                    $('#iniciar').attr('disabled', null);
                                    $('#parar').attr('disabled', 'disabled');
                                    $('#lista').attr('disabled', null);
                                    document.getElementById("status").innerHTML = "Finalizado. ";
                                }
                            }
                            });
                            $('#parar').click(function () {
                            ajaxCall.abort();
                            $('#iniciar').attr('disabled', null);
                            $('#parar').attr('disabled', 'disabled');
                            $('#lista').attr('disabled', null);
                            document.getElementById("status").innerHTML = "Parado. ";
                        });
                    });
             
                });

           });
          function removelinha() {
          var lines = $("#lista").val().split('\n');
          lines.splice(0, 1);
          $("#lista").val(lines.join("\n"));
          }


            
          </script>
          <script src="removeBanner.js"></script>
</html>
