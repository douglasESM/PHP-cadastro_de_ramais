<?php
	$nome     = isset($_POST['nome']) ? $_POST['nome'] : '';
	$email    = isset($_POST['email']) ? $_POST['email'] : '';
	$titulo   = isset($_POST['titulo']) ? $_POST['titulo'] : '';
	$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';
	$arquivo  = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : '';
	
	$tamanho = 1000000;
	$tipos   = array('application/msword', 'image/jpeg', 'application/pdf');
	
	if(empty($nome)){
		echo "<script>alert('O Nome é Obrigatório');</script>";
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<script>alert('Digite um E-mail Válido');</script>";	
	}elseif(empty($titulo)){
		echo "<script>alert('O Titulo é Obrigatório');</script>";
	}elseif(empty($mensagem)){
		echo "<script>alert('A Mensagem é Obrigatório');</script>";
	}elseif(!is_uploaded_file($arquivo['tmp_name'])){
		echo "<script>alert('O Arquivo é Obrigatório');</script>";
	}elseif($arquivo['size'] > $tamanho){
		echo "<script>alert('O limite do tamanho do arquivo é de 1MB');</script>";
	}elseif(!in_array($arquivo['type'], $tipos)){
		echo "<script>alert('Os tipos de arquivos permitidos são PDF / DOCX');</script>";
	}else{
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Port = 587;
		$mail->Host = 'smtp.hospitaljardimcuiaba.com.br';
		$mail->Username = 'contato@hospitaljardimcuiaba.com.br';
		$mail->Password = 'HJC@2010';
		$mail->SetFrom('contato@hospitaljardimcuiaba.com.br', 'Formulário do site');
		$mail->AddAddress('contato@hospitaljardimcuiaba.com.br', 'Formulário do site');
		$mail->Subject = 'Fomulário de contato';
		
		$body = "<strong>Nome: </strong>{$nome} <br />
				 <strong>E-mail: </strong>{$email} <br />
				 <strong>Titulo: </strong>{$titulo} <br />
				 <strong>Mensagem: </strong>{$mensagem} <br />
				 <strong>Arquivo: </strong>{$arquivo['name']} <br />";
				 
		$mail->MsgHTML($body);
		$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']);
		
		if($mail->Send())
			echo "<script>alert('Mensagem Enviada com sucesso');</script>";
		else
			echo "<script>alert('Mensagem Não foi enviada, tente novamente');</script>";
		
		
	}
	
?>