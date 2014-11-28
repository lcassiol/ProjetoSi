<?php

session_start();

require_once "Usuarios.php";


if (isset($_POST['login'])) 
{

	$email = $_POST['txtEmail'];
	$senha = $_POST['txtSenha'];

	$usuario = new Usuarios();
	$usuario->setEmail($email);
	$usuario->setSenha($senha);
	

	if($usuario->Logar()){
		echo "Pegou Porra";
		$_SESSION['UsuarioLogado'] = $email; 
		header('Location: ../principal.php');
	}else{
		echo "Deu Erro";
		$_SESSION['LoginErro'] = "Usuario ou Senha Incorretos";
		header('Location: ../index.php');
	}




}


?>