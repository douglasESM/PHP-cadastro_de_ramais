<?php
			if(isset($_POST['acao']) && $_POST['acao'] == 'enviar'){
				require('enviar.php');
			}
	

?>
<DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Cadastro de Curriculum</title>
 <link href="lib/css/bootstrap.min.css" rel="stylesheet">
 <link href="lib/css/style.css" rel="stylesheet">
</head>
<body> 
	<?php
			if(isset($msg))
				echo "<p id=\"msg\">$msg</p>";
	?>
			<div id="main" class="container-fluid">
	<form action="" method="post" enctype="multipart/form-data" data-toggle="validator">
			<fieldset>
				<legend>Preencha com seus dados</legend>
				
				<div class="row">
 					<div class="form-group col-md-3">
   						<label>Nome*:</label>
  					 	<input type="text" class="form-control" name="nome"  placeholder="Nome Completo" id="nome" required>
 					</div>
 
 					<div class="form-group col-md-3">
  						 <label>E-mail*:</label>
   						 <input type="email" class="form-control" name="email" placeholder="nome@dominio.com" id="email" data-error="Por favor, informe um e-mail correto." required>
 						 <div class="help-block with-errors"></div>
 					</div>
 
 					<div class="form-group col-md-3">
   						 <label>Titulo*:</label>
   						 <input type="text" class="form-control" name="titulo" placeholder="Titulo" id="titulo" required>
 					</div>
				</div>
				
				<div class="row">
 					<div class="form-group col-md-3">
   						 <label>Mensagem:</label>
  						 <textarea type="text" class="form-control" name="mensagem" placeholder="Escreva sua mensagem" id="mensagem" rows="5"></textarea>
					</div>
 
 					<div class="form-group col-md-4">
   						 <label>Arquivo: (permitidos DOCX / PDF)</label>
   						 <input type="file" class="form-control" name="arquivo" id="arquivo">
 					</div>
				</div>
				</div>
				<p>Obs: Os campos marcados com * são obrigatórios.</p>
				<input type="hidden" name="acao" value="enviar" />
				<input type="submit" value="Enviar Formulário" class="btn btn-success"/>
			</fieldset>
	</form>
<script src="lib/js/jquery.min.js"></script>
<script src="lib/js/bootstrap.min.js"></script>
<script src="lib/js/validator.min.js"></script>		
</body>
</html>