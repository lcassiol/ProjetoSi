<?php
session_start();

require_once "Usuarios.php";


if (isset($_POST['cadastrar'])) {

	$nome = $_POST['txtNome'];
	$email = $_POST['txtEmail'];
	$senha = $_POST['txtSenha'];

	$usuario = new Usuarios();

	$usuario->setNome($nome);
	$usuario->setEmail($email);
	$usuario->setSenha($senha);

	
	if($usuario->insert()){
		$_SESSION['cadastroSucesso'] = "Cadastro Realizado com Sucesso";

	}else{
		$_SESSION['cadastroSucesso'] = "Problemas no Cadastro";
	}

	header('Location: ../index.php');
}


?>