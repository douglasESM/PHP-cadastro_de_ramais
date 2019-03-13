<?php
	include "conexao.php";
?>
<html>
  <head>
    <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro PABX</title>
	
	<!-- Bootstrap -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  
  <body>
  <?php
	$buscar = $_POST['buscar'];
	$sql = "SELECT * FROM cadastro WHERE Nome LIKE '%$buscar%'";
	$row = ($sql);
	
	if($row < 0){
		
		while($linha = mysql_fetch_array($sql)){
			$nome = $linha['Nome'];
			$consultorio = $linha['Consultorio'];
			$setor = $linha['Setor'];
			$obs = $linha['Obs'];
			$ramal = $linha['ramal'];
			$telefone = $linha['telefone'];
			$cel01 = $linha['cel01'];
			$cel02 = $linha['cel02'];
			
			echo "<strong>Nome: </strong>".@$nome;
			echo "<br /><br />";
			echo "<strong>Consultório: </strong>".@$consultorio;
			echo "<br /><br />";
			echo "<strong>Setor: </strong>".@$setor;
			echo "<br /><br />";
			echo "<strong>Observações: </strong>".@$obs;
			echo "<br /><br />";
			echo "<strong>Ramal: </strong>".@$ramal;
			echo "<br /><br />";
			echo "<strong>Telefone: </strong>".@$telefone;
			echo "<br /><br />";
			echo "<strong>Celular 01: </strong>".@$cel01;
			echo "<br /><br />";
			echo "<strong>Celular 02: </strong>".@$cel02;
			
		}
		
	} else {
		echo "Desculpe, nenhum dado foi encontrado!";
		
		
	}
	

?>
  </body>
</html>