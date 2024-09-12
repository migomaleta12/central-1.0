<?php header("Content-Type: text/html; charset=utf-8"); session_start(); 
include_once("../verifica_login.php");
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Central</title>
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
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

<body id="body">
<center>
<h1 id="mr" style="color:white;"<h1>Sky </h1>
<h3 style="color: white;"> #CᥱᥒtrᥲᥣSh4doᥕ</h3></center>
<br>
	

<center><textarea id="lista" ></textarea></center>

<center><font color="white">Status: <span id="status" class="badge badge-pill badge-dark " style="background-color:white; color:black; border-radius:3.5px;">Parado.</span>   Aprovadas: <span   id="aprovadas_contar" class="badge badge-pill badge-dark " style="background-color:green; border-radius:6px;"  >0</span>  Reprovadas: <span  id="reprovadas_contar" class="badge badge-pill badge-dark "  style="background-color:red; border-radius:6px;"    >0</span>  Testadas: <span  id="testadas" class="badge badge-pill badge-dark " style="background-color:blue; border-radius:6px;">0</span>  Total: <span  id="carregadas" class="badge badge-pill badge-dark "  style="background-color:orange; border-radius:6px;">0</span></font></center>
<br><br>
	

       <center><button id="iniciar" type="button" class="btn btn-dark " style="width:100px;">INICIAR</button>
       <button id="parar" type="button" class="btn btn-dark "   style="width:100px;"  >PARAR</button></center>
  
       <br><br><br>



 
          <center>
            <input type="checkbox" id="aprov" >
            <span    id="apr" class="btn btn-dark btn btn-block" style="width: 70%; border:2.5px solid green; border-radius:5px;"><div id="aprovaM" >
           </div>  
 
  APROVADAS 

 						 <label id="par" for="aprov">Mostrar / Esconder</label></span>
						<div id="aprovaS"><div id="Aprovadas" style="border-radius:20px; width:70%; padding:0px; " ></div></div>
				
           <input type="checkbox" id="reprov" >
           <span id="rep"class="btn btn-dark btn btn-block" style="width: 70%;margin-top: 40px; border-radius:5px; border:2.5px solid red; "><div id="reprovaM" >
           </div>  

 REPROVADAS
 						 <label id ="re"for="reprov" >Mostrar / Esconder</label></span>
						<div id="reprovaS"> <div id="reprovadas" style="border-radius:0px 0px 10px 10px; width:70%; padding:5px; "></div> </div>
				
           
</center>
<center>
	</body>

              

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
                                 document.getElementById("Aprovadas").innerHTML += data + "<br>";
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
          
</html>