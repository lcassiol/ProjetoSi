<?php
	//dar start na sessão
	session_start();


	require_once "Classes/Mensagem.php";
?>



<html>
<head>
	<title>Inicial</title>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<?php 
		if (isset($_SESSION['UsuarioLogado'])) 
		{
			echo "Usuario ONline: " . $_SESSION['UsuarioLogado']; 
		}
	?>

	<h2>Cadastro</h2>
	<form action="classes/cadastraUsuario.php" method="POST">
		<label>Nome: </label>
		<input type="text" name="txtNome">

		<label>Senha: </label>
		<input type="password" name="txtSenha">

		<label>email: </label>
		<input type="text" name="txtEmail">

		<input type="submit" name="cadastrar">

	</form>

	<?php 
		if (isset($_SESSION['cadastroSucesso']) == "Cadastro Realizado com Sucesso") 
		{
			echo "<h4>". $_SESSION['cadastroSucesso'] . "</h4>";
			$_SESSION['cadastroSucesso'] = "";
		}else if (isset($_SESSION['cadastroSucesso']) == "Problemas no Cadastro"){
			echo "<h4>". $_SESSION['cadastroSucesso'] . "</h4>";
		}

		$_SESSION['cadastroSucesso'] = "";

	?>

	<h2>Login</h2>


	<form action="classes/login.php" method="POST">
		<label>email: </label>
		<input type="text" name="txtEmail">


		<label>Senha: </label>
		<input type="password" name="txtSenha">


		<input type="submit" name="login" value="Login">

	</form>

	<?php 
		if (isset($_SESSION['LoginErro'])) 
		{
			echo "<h4>". $_SESSION['LoginErro'] . "</h4>";
			$_SESSION['LoginErro'] = "";
		}else{
			//echo "<h4>Problemas no Cadastro</h4>";
		}

	?>

	<br><br><br>


	<h2>Mensagem</h2>


	<form action="classes/CadastroMensagem.php" method="POST">
		<label>Mensagem: </label>
		<textarea name="txtMensagem"></textarea>



		<input type="submit" name="CadMensagem" value="Criar">

	</form>

	<?php 
		if (isset($_SESSION['cadMsgErro'])) 
		{
			echo "<h4>". $_SESSION['cadMsgErro'] . "</h4>";
			$_SESSION['cadMsgErro'] = "";
		}else{
			//echo "<h4>Problemas no Cadastro</h4>";
		}

	?>



	<h2>Select da Msg</h2>



	<?php 

		$mensagem = new Mensagem();

		foreach ($mensagem->findall() as $key => $value) {
			echo $value->Id;
			$trechoMSg = $value->Mensagem;
			$trechoMSg = substr ( $trechoMSg , 0, 5 );

			echo '<a href="lerMensagem.php?' . $value->Id . '">';

			echo $trechoMSg . "</a>";

			
			echo $value->DT_H;
		}

	?>


</body>
</html>