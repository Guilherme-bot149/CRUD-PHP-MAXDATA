<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'crud');


$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar no banco de dados');
?>

