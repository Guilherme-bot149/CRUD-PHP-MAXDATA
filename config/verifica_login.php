<?php
// VERIFICAR SE O USUÁRIO TEM UMA SESSAO NO SISTEMA
if(!$_SESSION['usuario']){
    header('location: ../projeto/login.php');
    exit();
}