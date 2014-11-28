<?php
session_start();

require_once "Mensagem.php";


if (isset($_POST['CadMensagem'])) {

	$mensagemDigitada = $_POST['txtMensagem'];
	$email = $_SESSION['UsuarioLogado'];
	

	$mensagem = new Mensagem();

	$mensagem->setMensagem($mensagemDigitada);
	$mensagem->setEmail_usuario($email);

	echo $mensagemDigitada . " e o usuario que digitou: " . $email;

	if($mensagem->insert()){
		$_SESSION['cadMsgErro'] = "Mensagem Cadastrada com Sucesso";

	}else{
		$_SESSION['cadMsgErro'] = "Problemas no Cadastro da Mensagem";
	}

	header('Location: ../index.php');
}


?>