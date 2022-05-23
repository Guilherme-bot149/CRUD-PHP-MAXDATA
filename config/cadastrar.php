<?php
	// ACAO PARA O CADASTRO DE UM NOVO CLIENTE
	session_start();	
	include("conexao.php");

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$cep = $_POST['cep'];
	$email = $_POST['email'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidades'];
	$telefone = $_POST['telefone'];
	$nascimento = $_POST['nascimento'];
	$ativo_desativo = $_POST['ativo_desativo'];

	$query = "select count(*) as total from clientes where cli_cpf = '$cpf'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_fetch_assoc($result);

	if($row['total'] == 1) {
		$_SESSION['cliente_existe'] = true;
		header('Location: ../cadastro.php');
		exit;
	}
	
	$query = "INSERT INTO clientes (
				cli_nome, 
				cli_cpf, 
				cli_cep, 
				cli_email, 
				cli_rua, 
				cli_numero, 
				cli_bairro, 
				cidade_cidade_id,
				cli_telefone, 
				cli_nascimento, 
				cli_ativo_desativo) 
			VALUES (
				'$nome', 
				'$cpf', 
				'$cep', 
				'$email', 
				'$rua', 
				'$numero', 
				'$bairro',  
				'$cidade', 
				'$telefone', 
				'$nascimento', 
				'$ativo_desativo')";

	if($conexao->query($query) === TRUE) {
		$_SESSION['status_cadastro'] = true;
	}
	else
	{
		$_SESSION['erro_cadastro'] = true;
	}

	$conexao->close();

	header('Location: ../index.php');
	exit;
?>