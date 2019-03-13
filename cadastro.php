<?php
    include "conexao.php";

    header("charset=utf-8");

$nome = $_POST['nome'];
$consultorio = $_POST['consultorio'];
$setor = $_POST['setor'];
$obs = $_POST['obs'];
$ramal = $_POST['ramal'];
$telefone = $_POST['telefone'];
$cel01 = $_POST['cel01'];
$cel02 = $_POST['cel02'];
$connect = mysql_connect($host,$user,$pass);
$db = mysql_select_db($database);
$query_select = "SELECT nome FROM cadastro WHERE nome = '$nome'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['nome'];
 

    if($nome == "" || $nome == null){

        echo"<script language='javascript' type='text/javascript'>alert('O campo NOME deve ser preenchido');window.location.href='index.php';</script>";
        }else{

            if($logarray == $nome){
                echo"<script language='javascript' type='text/javascript'>alert('Esse nome ja existe');window.location.href='index.php';</script>";

                die();
            }else{

                $query = "INSERT INTO cadastro (nome,consultorio,setor,obs,ramal,telefone,cel01,cel02) 
                          VALUES ('$nome','$consultorio','$setor','$obs','$ramal','$telefone','$cel01','$cel02')";
                $insert = mysql_query($query, $connect);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com sucesso!');window.location.href='index.php'</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('Nao foi possível cadastrar esse usuario');window.location.href='index.php'</script>";
            }
        }
    }
?>