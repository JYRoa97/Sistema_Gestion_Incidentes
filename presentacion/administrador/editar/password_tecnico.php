<?php
include "presentacion/administrador/menu.php";
if(isset($_POST['registro'])) {
    $clave = $_POST['clave'];
    $clave_repetir = $_POST['clave_repetir'];
    $error = array();
    if($clave == $clave_repetir) {
        $tecnico= new tecnico("",$_GET['id'],"","","","",$clave);
        $tecnico->cambiar_contraseña();

    }else{
        $error[]="Las claves no coinciden";
    }

}
?>
<div class="contenedor-formulario ">
    <div class="wrap">
        <form class="formulario"
              name = "formulario_registro"
              enctype="multipart/form-data"
              action="index.php?pid=<?php echo base64_encode("presentacion/administrador/editar/password_usuario.php");?>&id=<?php echo $_GET['id'] ?>"
              method="post" >
            <?php
            if (!empty($error)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $error[0] ?></div>
            <?php }?>
            <div>
                <div class="input-group">
                    <input type="password" name="clave" id="textInput" value="">
                    <label class="label" for="nombre">Nueva Contraseña:</label>
                </div>
                <div class="input-group">
                    <input type="password" name="clave_repetir" required id="textInput1" value="">
                    <label class="label" for="nombre">
                        Repetir Nueva Contraseña:
                    </label>

                </div>

                <button type="submit" class="btn btn-primary" name="registro"> Registrar </button>
            </div>
        </form>
    </div>
</div>