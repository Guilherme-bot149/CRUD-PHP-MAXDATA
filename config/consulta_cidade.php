<?php 
// CONSULTA CIDADES NA BASE DE DADOS
$conexao_cidade = new PDO("mysql:host=localhost;dbname=crud", "root", "root");

$consultarCidades = $conexao_cidade->prepare("SELECT * FROM cidades WHERE estado_uf_id = '".$_POST['id']."'");
$consultarCidades->execute();
$fetchAll = $consultarCidades->fetchAll();
foreach($fetchAll as $cidades)
{
  echo '<option value="'.$cidades['cidade_id'].'">'.$cidades['cidade_nome'].'</option>';
}

?>