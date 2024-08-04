<!DOCTYPE html>
<html lang="pt-br">
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link href="css/style.css" rel="stylesheet" type="text/css" /> 
  <title>Dados do Clima</title>
</head>
<body>
  <header>
    <h1>Dados do Clima</h1>
  </header>

  <section>
    <div id="cityInfo">
      <?php
       
      $cidadeId = $_POST['cidade_id'];
      $url = "http://servicos.cptec.inpe.br/XML/cidade/$cidadeId/previsao.xml";

      $xmlContent = file_get_contents($url);

      if($xmlContent === FALSE){

        die('Erro ao acessar API');
      }

      $xml = simplexml_load_string($xmlContent);

      if($xml === FALSE){
        die('Erro ao carregar xml');
      }

      //Exibindo as informações
      echo "<h1>Previsão de tempo para ".htmlspecialchars($xml->nome). " - ".htmlspecialchars($xml->uf)."</h1>"; 

      echo "<table border=1>";
      echo "<tr><th>Data</th><th>Máxima (°C)</th><th>Mínima (°C)</th>";
      foreach($xml->previsao as $previsao){
        $data = new DateTime($previsao->dia);
        $dataFormatada = $data->format('d/m/y');


        echo "<tr>";
        echo "<td>".htmlspecialchars($dataFormatada)."</td>";
        echo "<td>".htmlspecialchars($previsao->maxima)."</td>";
        echo "<td>".htmlspecialchars($previsao->minima)."</td>";
      echo "</tr>";
    }

  ?>
</div>

<form action="index.php" method="get">
  <input type="submit" value="Voltar para a página inicial" class="botao">
</form>
</section>
</body>
</html>