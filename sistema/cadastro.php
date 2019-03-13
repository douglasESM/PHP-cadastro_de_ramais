<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['login'];
?>
  <head>
	<script src="jquery.js" type="text/javascript"></script>
	<script src="jquery.maskedinput.js" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistema de academia de luta</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="lib/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="lib/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	jQuery(function($){
       $("#campoData").mask("99/99/9999");
       $("#campoTelefone").mask("(99) 9999-9999");
       $("#campoSenha").mask("***-****");
	   $("#campoCelular").mask("(99) 99999-9999");
	   $("#campoCPF").mask("999.999.999-99");
	   $("#campoCEP").mask("99999-999");
	});
	</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dudu Extreme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Sair</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="site.php">Inicio<span class="sr-only">(current)</span></a></li>
            <li><a href="cadastro.php">Cadastro de Aluno</a></li>
            <li><a href="matriculas.php">Controle de Matrículas</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Preencha com os dados do aluno</h3>

          <div class="row">
 					<div class="form-group col-md-3">
   						<label>Nome:</label>
  					 	<input type="text" class="form-control" name="nome"  placeholder="Nome Completo" id="nome" required autofocus>
 					</div>
 
 					<div class="form-group col-md-3">
  						 <label>Endereço:</label>
   						 <input type="text" class="form-control" name="email" placeholder="Endereço" id="email">
 					</div>
 
 					<div class="form-group col-md-3">
   						 <label>Bairro:</label>
   						 <input type="text" class="form-control" name="titulo" placeholder="Bairro" id="titulo">
 					</div>
		</div>
		 <div class="row">
 		 			<div class="form-group col-md-3">
   						<label>CEP:</label>
  					 	<input type="text" class="form-control" name="campoCEP"  placeholder="78000-000" id="campoCEP">
 					</div>
 
 					<div class="form-group col-md-3">
  						 <label>Cidade:</label>
   						 <input type="text" class="form-control" name="email" placeholder="Cidade" id="email">
 					</div>
 
 					<div class="form-group col-md-2">
   						 <label>UF:</label>
   						 <input type="text" class="form-control" name="titulo" placeholder="Sigla estado" id="titulo">
 					</div>
		</div>
		<div class="row">
 		 			<div class="form-group col-md-3">
   						<label>Sexo:</label>
  					 	<input type="text" class="form-control" name="nome"  placeholder="78000-000" id="nome">
 					</div>
 
 					<div class="form-group col-md-2">
  						 <label>CPF:</label>
   						 <input type="text" class="form-control" name="campoCPF" placeholder="000.000.000.00" id="campoCPF">
 					</div>
 
 					<div class="form-group col-md-2">
   						 <label>RG:</label>
   						 <input type="text" class="form-control" name="titulo" placeholder="Sigla estado" id="titulo" required>
 					</div>
		</div>
		<div class="row">
 		 			<div class="form-group col-md-3">
   						<label>Data de Nascimento:</label>
  					 	<input type="text" class="form-control" name="campoData"  placeholder="__/__/____" id="campoData">
 					</div>
 
 					<div class="form-group col-md-3">
  						 <label>Email:</label>
   						 <input type="text" class="form-control" name="email" placeholder="nome@dominio.com" id="email">
 					</div>
 
 					<div class="form-group col-md-2">
   						 <label>Telefone:</label>
   						 <input type="text" class="form-control" name="campoTelefone" placeholder="(__) ____-____" id="campoTelefone">
 					</div>
		</div>
		<div class="row">
 		 			<div class="form-group col-md-2">
   						<label>Celular:</label>
  					 	<input type="text" class="form-control" name="campoCelular"  placeholder="(__) _____-____" id="campoCelular">
 					</div>
		</div>
			<input type="submit" value="Salvar dados" class="btn btn-success"/>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Consultorio</th>
                  <th>Setor</th>
                  <th>Observações</th>
                  <th>Ramal</th>
                  <th>Telefone</th>
                  <th>Celular 01</th>
                  <th>Celular 02</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="lib/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="lib/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="lib/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>