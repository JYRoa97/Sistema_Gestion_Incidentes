<?php
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $administrador= new administrador("","","","","",$correo,$clave);
    $usuario= new usuario("","","","","",$correo,$clave);
    $tecnico = new tecnico("","","","","",$correo,$clave);
    if($administrador->autenticar()){
        $_SESSION['id']=$administrador->traerid();
        $direccion=base64_encode("presentacion/administrador/seccion.php");
        header("Location: index.php?pid=".$direccion);
    }else if($usuario->autenticar()){
        $_SESSION['id']=$usuario->traerid();
        $direccion=base64_encode("presentacion/usuario/seccion.php");
        header("Location: index.php?pid=".$direccion);
    }else if($tecnico->autenticar()){
        $_SESSION['id']=$tecnico->traerid();
        $direccion=base64_encode("presentacion/tecnico/seccion.php");
        header("Location: index.php?pid=".$direccion);

    }else{
        header("Location: index.php");
    }

?>

