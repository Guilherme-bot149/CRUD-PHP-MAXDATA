<?php
// SAIR DO SISTEMA WEB
session_start();
session_destroy();
header('location: ../login.php');
exit();