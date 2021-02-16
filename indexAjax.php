<?php
include_once "persistencia/Conexion.php";
include_once "logica/persona.php";
include_once "persistencia/usuarioDAO.php";
include_once  "logica/usuario.php";
include_once "persistencia/tecnicoDAO.php";
include_once "logica/tecnico.php";
include "persistencia/visitaDAO.php";
include "logica/visita.php";
include "logica/incidente.php";
include "persistencia/incidenteDAO.php";
include "logica/telefono.php";
include "persistencia/telefonoDAO.php";
$pid = base64_decode($_GET["pid"]);
//$_SESSION['id']= $_GET['id'];
include $pid;
?>


