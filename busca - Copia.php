<?php
	//Faz a conexão com o banco de dados
	mysql_connect('10.1.1.113', 'pabx', '123') or die("Erro ao Conectar");
	mysql_select_db('pabx') or die("Erro ao Selecionar Banco");
	
	//Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');
	
	//Recupera a pesquisa feita
	$pesquisa 	= mysql_real_escape_string($_POST['palavra']);
	//Recupera oque foi selecionado
	$campo 		= mysql_real_escape_string($_POST['campo']);

	//Cria a SQL para fazer a consulta no banco, e onde se poe o nome do campo, trocamos pela váriavel '$campo'
	/*Exemplo: se for selecionado o campo titulo, então ele pequisa na tabela no campo titulo,
	se for selecionado o campo telefone ele faz a pesquisa no campo telefone da tabela*/
	$sql = "SELECT * FROM cadastro WHERE $campo LIKE '%$pesquisa%'";

	//Excuta a SQL
	$query		= mysql_query($sql) or die("Erro ao Pesquisar");
	
	//Se não for encontrado nada, então diz: 'Nada Encontrado...', se não retorna o resultado
	if(mysql_num_rows($query) <= 0){
		echo 'Nada Encontrado...';
	}else{
		//Como é retornado um array, então precisamos colocar novamente a váriavel '$campo' onde colocamos a nome do campo a ser exibido
		 while($res = mysql_fetch_assoc($query)){
			echo '<li><strong>Nome:</strong>'.$res[$campo].'</li>';
			echo '<li><strong>Consultorio:</strong>'.$res['Consultorio'].'</li>';
			echo '<li><strong>Setor:</strong>'.$res['Setor'].'</li>';
			echo '<li><strong>Observações:</strong>'.$res['Obs'].'</li>';
			echo '<li><strong>Ramal:</strong>'.$res['Ramal'].'</li>';
			echo '<li><strong>Telefone:</strong>'.$res['Telefone'].'</li>';
			echo '<li><strong>Celular 01:</strong>'.$res['Cel01'].'</li>';
			echo '<li><strong>Celular 02:</strong>'.$res['Cel02'].'</li><br>';

        }
	}
	
?>


