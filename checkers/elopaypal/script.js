              $(document).ready(function () {
              $('#start').attr('disabled', null);
              $('#start').click(function () {
                
                var line = $('#list').val().split('\n');
                var total = line.length;
                var ap = 0;
                var rp = 0;
                var token;
                token = document.getElementById('key').value;
                var st = 'Aguardando...';
                $('#carregadas').html(total);
                
                $('#status').html(st);
                line.forEach(function (value) {
                  var list = value.split('|');
                  var email = list[0];
                  var senha = list[1];
                  
                  var ajaxCall = $.ajax({
                    url: 'api.php',
                    type: 'GET',
                    data: 'lista=' + value + '&token=' + token,
                    beforeSend: function () {
                      $('#stop').attr('disabled', null);
                      $('#start').attr('disabled', 'disabled');
                      var st = 'Testando...';
                      $('#status').html(st);                      
                    },
                    success: function(data){
                      if(data.indexOf("Live") >= 0){ 
                        $("#lives").val(data + "\n" + $("#lives").val());
                        ap = ap + 1;
                        document.getElementById("lives").innerHTML += data + "";
                        removelinha();
                      }else{
                        $("#dies").val(data + "\n" + $("#dies").val());                        rp = rp + 1;
                        document.getElementById("employe").innerHTML += data + "";
                        removelinha();
                      }
                      var fila = parseInt(ap) + parseInt(rp);
                      $('#cLive').html(ap);
                      $('#cDie').html(rp);
                      $('#total').html(fila);
                      var result = (fila/total)*100;
                      $('#pct').html(result);
                      $('#title').html('[' + fila + '/' + total + '] Checker de Geradas ELO');
                      document.getElementById("progreso").style.width = result + "%";
                      if (fila == total) {
                        $('#start').attr('disabled', null);
                        $('#stop').attr('disabled', 'disabled');
                        var st = 'Terminado...';
                        swal("Concluido!", "Todas informações foram testadas.", "success");
                        $('#status').html(st);
                      }}
                  });
                  $('#stop').click(function () {
                    ajaxCall.abort();
                    $('#start').attr('disabled', null);
                    $('#stop').attr('disabled', 'disabled');
                    var st = 'Pausado...';
                    $('#status').html(st);
                  });
                });
              });
            });
             function stopado() {
              var lines = $("#list").val().split('\n');
              lines.splice(0, 1);
              $("#list").val(lines.join("\n"));
            }
            function removelinha() {
              var lines = $("#list").val().split('\n');
              lines.splice(0, 1);
              $("#list").val(lines.join("\n"));
            }
            
 function MyFunctionApagaLives() {
  var copyText = document.getElementById("lives");
  copyText.select();
  document.execCommand("delete");
  swal("Concluido!", "Todas informações foram apagadas.", "success");
}
          
function MyFunctionLives() {
  var copyText = document.getElementById("lives");
  copyText.select();
  document.execCommand("copy");
  swal("Concluido!", "Todas informações foram copiadas.", "success");
}

function MyFunctionApagaDies() {
  var copyText = document.getElementById("employe");
  copyText.select();
  document.execCommand("delete");
  swal("Concluido!", "Todas informações foram apagadas.", "success");
}

function MyFunctionDies() {
  var copyText = document.getElementById("employe");
  copyText.select();
  document.execCommand("copy");
  swal("Concluido!", "Todas informações foram copiadas.", "success");
}