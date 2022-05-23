<?php
// EDITAR CLIENTE DA BASE DE DADOS
session_start();
include("conexao.php");

$id= filter_input(INPUT_GET, 'id');
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


$query = ("UPDATE clientes SET 
			cli_nome = '{$nome}', 
			cli_cpf = '{$cpf}', 
			cli_cep = '{$cep}', 
			cli_email = '{$email}', 
			cli_rua = '{$rua}', 
			cli_numero = '{$numero}', 
			cli_bairro = '{$bairro}', 
			cidade_cidade_id = '{$cidade}', 
			cli_telefone = '{$telefone}', 
			cli_nascimento = '{$nascimento}', 
			cli_ativo_desativo = '{$ativo_desativo}'
			WHERE cli_id = $id");

if($conexao->query($query) === TRUE) {
	$_SESSION['status_alterado_cliente'] = true;
}
else
{
    $_SESSION['erro_alterado_cliente'] = true;
}

$conexao->close();

header('Location: ../index.php');
exit;
?>

