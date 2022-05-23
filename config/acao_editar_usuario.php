<?php
// ACAO PARA EDITAR OS DADOS DO USUÁRIO DO SISTEMA
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$email  = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha_confirmar'];

$query = ("UPDATE usuario SET nome = '{$nome}', email = '{$email}', usuario = '{$usuario}', senha = md5('{$senha}') WHERE idusuario = 1");

if($conexao->query($query) === TRUE) {
	$_SESSION['status_alterado'] = true;
}
else
{
    $_SESSION['erro_alterado'] = true;
}

$conexao->close();

header('Location: ../usuario.php');
exit;
?>

