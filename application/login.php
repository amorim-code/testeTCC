<?php

	session_start();
	include('conexao.php');

	$_SESSION['usuario'] = mysqli_real_escape_string($conexao, $_POST['txtRM']);
	$_SESSION['cargo'] = $_POST['cargo'];
	$senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);

	
	//Caso o usuário tente acessar a página pelo endereço dela (tentar ir pro login sem colocar as informações no index)
	if(empty($_SESSION['usuario']) || empty($senha))
	{
		header("location:index.php");
		exit();
	}

	$query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$_SESSION['usuario']}' AND senhaUsuario = '{$senha}' AND perfilUsuario = '{$_SESSION['cargo']}'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);

	if($row == 1)
	{
		//Senha padrão = "ETECHAS"
		if($senha == "ETECHAS")
		{
			header("location:atualizarSenha.php");
		}
		else
		{
			if($_SESSION['cargo'] == "aluno")
			{
				header("location:inicioAluno.php");
			}
			if($_SESSION['cargo'] == "professor")
			{
				header("location:inicioProfessor.php");
			}
			if($_SESSION['cargo'] == "gestor")
			{
				header("location:inicioGestor.php");
			}
		}
	}
	else
	{
		header("location:index.php");
	}
	?>
