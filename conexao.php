<?php
$host='10.1.1.113';
$user = 'pabx';
$pass = '123';
$database = 'pabx';
$connection = mysql_connect($host,$user,$pass) or die ("Erro ao Conectar!<br>" . mysql_error());
mysql_select_db($database) or die ("Erro ao Selecionar Banco" . mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET charecter_set_client=utf8');
mysql_query('SET charecter_set_results=utf8');

?>