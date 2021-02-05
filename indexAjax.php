<?php
include_once "persistencia/Conexion.php";
include_once "logica/persona.php";
include_once "persistencia/usuarioDAO.php";
include_once  "logica/usuario.php";
$pid = base64_decode($_GET["pid"]);
//$_SESSION['id']= $_GET['id'];
include $pid;
?>


