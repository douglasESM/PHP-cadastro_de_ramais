<?php
	/*Faz a conexão com o banco de dados
	mysql_connect('10.1.1.113', 'pabx', '123') or die("Erro ao Conectar");
	mysql_select_db('pabx') or die("Erro ao Selecionar Banco");*/
	include "conexao.php";
	try{
		$stmt = $conn->prepare("SELECT nome, consultorio, setor, obs, ramal, telefone, cel01, cel02 
		FROM cadastrowhere $campo LIKE '%$pesquisa%'");
		stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll()))) as $k=>$v){
			echo$v
		}
	}
	/*Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');*/
	
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
		 $tabela = "<h2 class='sub-header'>Resultado da busca</h2>
          <div class='table-responsive'>
            <table class='table table-striped'>
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
                    <tr>";
        $return = $tabela;
		 while($res = mysql_fetch_assoc($query)){
			$return.= "<td>".$res[$campo]."</td>";
			$return.="<td>".$res['nome']."</td>";
            $return.= "<td>".$res['consultorio']."</td>";
            $return.= "<td>".$res['setor']."</td>";
            $return.= "<td>".$res['obs']."</td>";
            $return.= "<td>".$res['ramal']."</td>";
            $return.= "<td>".$res['telefone']."</td>";
            $return.= "<td>".$res['cel01']."</td>";
            $return.= "<td>".$res['cel02']."</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";
	}

?>


