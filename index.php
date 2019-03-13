<?php  
include "conexao.php";

?>

<DOCTYPE html>
	<html lang="pt-br">
	<head>
		 <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <title>Cadastro PABX</title>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){

	//PESQUISA INSTANTANEA PELO INPUT
	$("#pesquisa").keyup(function(){
		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa 	= $(this).val();

		//Recupera oque foi selecionado
		var campo 		= $("#campo").val();

		//Verifica se foi digitado algo
		if(pesquisa != ''){
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul com a class 'resultados' oque foi retornado
				$(".resultados").html(retorna);
			});
		}else{
			$(".resultados").html('');
		}
	});

	//PESQUISA INSTANTANEA PELO SELECT
	$("#campo").change(function(){
		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa = $("#pesquisa").val();

		//Recupera oque foi selecionado
		var campo 		= $(this).val();

		//Verifica se foi digitado algo
		if(pesquisa != ''){
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul com a class 'resultados' oque foi retornado
				$(".resultados").html(retorna);
			});
		}else{
			$(".resultados").html('');
		}
	});

	//PESQUISA DE FORMULÀRIO
	$("#form-pesquisa").submit(function(e){
		//Cancela a ação padrao o formulário, impedindo que ele atualize a página
		e.preventDefault();

		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa = $("#pesquisa").val();

		//Recupera oque foi selecionado
		var campo = $("#campo").val();
		
		//Se não for digitado nada, então ele mostra um alert
		if(pesquisa == ''){
			alert('Informe sua Pequisa!');
		}else{
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				$(".resultados").html(retorna);
			});
		}
	});
});
</script>
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
 <link href="lib/css/bootstrap.min.css" rel="stylesheet">
 <link href="lib/css/style.css" rel="stylesheet">
<script>
	jQuery(function($){
		$("#campoData").mask("99/99/9999");
		$("#telefone").mask("(99) 9999-9999");
		$("#campoSenha").mask("***-****");
		$("#celular").mask("(99) 99999-9999");
		$("#celular1").mask("(99) 99999-9999");
		$("#campoCPF").mask("999.999.999-99");
		$("#campoCEP").mask("99999-999");
		$("#ramal").mask("999");
	});
</script>
</head>
<body> 
<div class="container">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		 <div class="container-fluid">
			  <div class="navbar-header">
				   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					    <span class="sr-only">Toggle navigation</span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
				   </button>
				   <a class="navbar-brand" href="#" >Hospital Jardim Cuiabá</a>
			  </div>
		 </div>
	</nav>

	<div id="main" class="container-fluid">
		 <h3 class="page-header">Cadastrar</h3>

		<form method="POST" action="cadastro.php">
			<div class="row">

				<div class="form-group col-md-3">
					   <label>Nome Completo</label>
					   <input type="text" class="form-control" name="nome" id="nome" required>
				</div>
				 
				<div class="form-group col-md-3">
					   <label>Consultório</label>
					   <input type="text" class="form-control" name="consultorio" id="consultorio">
				</div>
				 
				<div class="form-group col-md-3">
					<label>Setor</label>
					<select type="text" class="form-control" name="setor" id="setor">
						<?php
							$consulta = mysql_query("SELECT * FROM localizacao order by Local ASC") or die(mysql_error()); 

							while ($setor = mysql_fetch_array($consulta)) {
								echo  ("<option value='".$setor['local']."'>".$setor['local']."</option>");}
						?>
					</select>
						   
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-3">
			  	   <label>Observações</label>
					   <textarea type="text" class="form-control" name="obs" placeholder="Escreva sua mensagem" id="obs" rows="5">
					 	
					 </textarea>
				</div>
					 
				<div class="form-group col-md-2" style="width: 100px;">
				    <label>Ramal</label>
				    <input type="text" class="form-control" name="ramal" id="ramal">
				</div>
				<div class="form-group col-md-2">
				    <label>Telefone</label>
				    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(__) ____-____" required>
				</div>
			</div>

			<div class="row">
				 <div class="form-group col-md-2">
					   <label>Celular 01</label>
					   <input type="text" class="form-control" name="cel01" id="celular" placeholder="(__) _____-____" required>
				 </div>
						 
				 <div class="form-group col-md-2">
					   <label>Celular 02</label>
					   <input type="text" class="form-control" name="cel02" id="celular1" placeholder="(__)____-____">
				 </div>
			</div>
			
			<!-- area de campos do form -->
			<div id="actions" class="row">
			    <div class="col-md-12">
				     <button type="submit" class="btn btn-primary" id="cadastrar" name="cadastrar">Salvar</button>  
				      <a href="index.html" class="btn btn-default">Cancelar</a>
				</div>
			</div>
		</form>
			

			<!-- Formulário busca -->

		<div id="main" class="container-fluid">
			<h3 class="page-header">
				Pesquisar
			</h3>

			<form id="form-pesquisa"action="" name="busca" method="POST">
				<select id="campo">
					<!-- Os valores das opções devem ser os mesmos nomes dos campos dos quias se quer a pesquisa -->
					<option selected value="nome">Buscar por nome</option>
				</select>
				<label id="campo" selected value="Nome" for="consulta">Buscar:</label>
				<input class="form-control" type="text" name="pesquisa" id="pesquisa"maxlength="100" />
			</form>
		</div>
		  
		
		<ul class="resultados">
		</ul>

		<script src="lib/js/jquery.min.js"></script>
		<script src="lib/js/bootstrap.min.js"></script>
		</div>
		</div>
	</body>
</html>