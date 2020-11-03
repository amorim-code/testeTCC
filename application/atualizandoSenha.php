<?php
	include('conexao.php');
	session_start();

	$senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);
	$senha2 = mysqli_real_escape_string($conexao, $_POST['txtSenha2']);

	//Caso o usuário tente acessar a página pelo endereço dela (tentar ir pro atualizando sem colocar as informações no atualizar)
	if(empty($senha) || empty($senha2))
	{
		header("location:index.php");
		exit();
	}

	if($senha == $senha2)
	{
		$query = "UPDATE usuario SET senhaUsuario = '{$senha}' WHERE rmUsuario = '{$_SESSION['usuario']}'";

		$result = mysqli_query($conexao, $query);

		header("location:inicioAluno.php");
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

?> 
