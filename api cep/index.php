<?php
	require_once("viacep.php");
?>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link href="css/style.css" rel="stylesheet" type="text/css" /> 
 <!-- Inclua o jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Inclua o jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function(){
      $("input[name='cep']").mask("99999-999");
    });
  </script>
  <title>Consumindo API</title>
  
</head>
<body>
	<header>
		<h1>Digite o CEP para Encontrar o Endereço</h1>
	</header>
	<section>
		<form action="." method="POST">
			<label for="nome"> Digite um CEP</label>
			<input type="text" required="required" name="cep" size="40">
			</br>
			<input type="submit" value="Enviar Dados" class="botao"/>
			</br>
			<label for="nome">Logradouro</label>
			<input type="text" placeholder="rua" name="rua" value="<?php echo $logradouro ?>" size="40">
			<label for="nome">Bairro</label>
			<input type="text" placeholder="bairro" name="bairro" value="<?php echo $bairro ?>" size="40">
			<label for="nome">Cidade</label>
			<input type="text" placeholder="cidade" name="cidade" value="<?php echo $cidade ?>" size="40">
			<label for="nome">Estado</label>
			<input type="text" placeholder="estado" name="estado" value="<?php echo $estado ?>">
			
		</form>
	</section>
</body>
</html>





