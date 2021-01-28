<?php
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $administrador= new administrador("","","","","",$correo,$clave);
    if($administrador->autenticar()){
        include 'administrador/seccion.php';
    }else{
        header("Location: index.php");
    }

?>

