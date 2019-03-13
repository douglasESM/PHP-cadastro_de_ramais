<?php
/*
$host='127.0.0.1';
$user = 'root';
$pass = '';
$database = 'pabx';

$connection = mysqli_connect($host,$user,$pass) or die ("Erro ao Conectar!<br>" . mysql_error());

mysql_select_db($database) or die ("Erro ao Selecionar Banco" . mysql_error());

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET charecter_set_client=utf8');
mysql_query('SET charecter_set_results=utf8');


$host "localhost";
$user = "root";
$pass = "";

//Cria a conexão
$connection = mysqli_connect($servername, $username, $password);

//Testando a conexão
if (!$connection) {
    die( "Connection failed: " . mysqli_connect_error());
}
echo "Conexão realizada com Sucesso!"*/


$host = 'localhost';
$user = 'root';
$pass = '1234';
$dbName

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    //set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected sucessfully";
}
catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
?>