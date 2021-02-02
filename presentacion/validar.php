<?php
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $administrador= new administrador("","","","","",$correo,$clave);
    if($administrador->autenticar()){
        $_SESSION['id']=$administrador->traerid();
        echo $_SESSION['id'];
        $direccion=base64_encode("presentacion/administrador/seccion.php");
        header("Location: index.php?pid=".$direccion);
    }else{
        header("Location: index.php");
    }

?>

