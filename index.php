<?php
session_start();
include "logica/persona.php";
include "persistencia/administradorDAO.php";
include "persistencia/tecnicoDAO.php";
include "persistencia/usuarioDAO.php";
include "persistencia/Conexion.php";
include "logica/administrador.php";
include "logica/tecnico.php";
include  "logica/usuario.php"
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/select.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body class="fondo">


    <?php
        if ((isset($_SESSION['id']) or isset($_GET['sa']))  and isset($_GET["pid"]) ){
            $pid = base64_decode($_GET["pid"] );
            include $pid;
        }else{
            session_destroy ();
            include "presentacion/inicio.php";
        }
    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/formulario.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>