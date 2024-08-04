<?php
// Inclua o arquivo clima.php onde a lógica de obter os dados do clima será centralizada
require_once("localidade.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link href="css/style.css" rel="stylesheet" type="text/css" /> 
  <!-- Inclua o jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <title>Consumindo API</title>
</head>
<body>
  <header>
    <h1>Consulta Localidade</h1>
  </header>
  <section>
    <form id="cityForm" action="." method="POST" accept-charset="UTF-8">
      <label for="nome">Digite o nome da cidade</label>
      <input type="text" required="required" name="city" id="city" size="40">
      <br>
      <input type="submit" value="Consultar" class="botao"/>
      <br>
    </form>
    <div id="cityInfo"></div>
  </section>

  <script>
    $(document).ready(function() {
      $('#cityForm').submit(function(event) {
        event.preventDefault(); // Previne o envio normal do formulário
        
        var cityName = $('#city').val();
        
        $.post('localidade.php', { city: cityName }, function(response) {
          var data = JSON.parse(response);
          
          var output = '<h2>Informações da Cidade:</h2>';
          $(data.cidade).each(function(index, cidade) {
            output += '<p><strong>Nome:</strong> ' + cidade.nome + '</p>';
            output += '<p><strong>UF:</strong> ' + cidade.uf + '</p>';
            output += '<p><strong>ID:</strong> ' + cidade.id + '</p>';
            output += '<hr>';
          });
          
          $('#cityInfo').html(output);
        });
      });
    });
  </script>
</body>
</html>
