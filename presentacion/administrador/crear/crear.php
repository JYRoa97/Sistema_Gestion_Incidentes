<?php
include "presentacion/administrador/menu.php";

if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $identificacion=$_POST['identificacion'];
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $rol=$_POST['rol'];
    $clave_repetir = $_POST['clave_repetir'];
    $error= array();
    switch ($rol){
        case '1':
            $usuario= new usuario("","",$nombre,$apellido,$identificacion,$correo,$clave);
            if ($usuario->correolibre() ){
                if($clave == $clave_repetir){
                    if($usuario->identificacion_libre()) {
                        if (isset($_FILES['foto'])) {
                            $extensions = array("jpeg", "jpg", "png");
                            $ext_archivo = explode(".", $_FILES['foto']['name']);
                            $ext_archivo = end($ext_archivo);
                            if (in_array($ext_archivo, $extensions) === false) {
                                $error[] = "Extension no permitada, escoja un archivo con extension JPEG, PNG o JPG.";
                            }
                            if ($_FILES['foto']['size'] > 2097152) {
                                $error[] = "El archivo no debe pesar mas de 2MB";
                            }
                            if (empty($error)) {
                                $hora = round(microtime(true) * 1000);
                                $nombreFoto = $hora . "." . $ext_archivo;
                                move_uploaded_file($_FILES['foto']['tmp_name'], "Resources/Images/" . $nombreFoto);
                                $usuario->setFoto($nombreFoto);
                                $usuario->crear();
                                header("Location: index.php?pid=" . base64_encode('presentacion/administrador/seccion.php') . "&tipo=1");

                            }
                        }
                    }else{
                        $error[]="Numero de identificaion ya registrado";
                    }
                }else{
                    $error[]="Las claves no coinciden";
                }

            }else{
                $error[]="Correo ya registrado";
            }

            break;
        case '2':
            $tecnico= new tecnico("","",$nombre,$apellido,$identificacion,$correo,$clave);
            if ($tecnico->correolibre()){
                if($clave == $clave_repetir){
                    if($tecnico->identificacion_libre()) {
                        if (isset($_FILES['foto'])) {
                            $extensions = array("jpeg", "jpg", "png");
                            $ext_archivo = explode(".", $_FILES['foto']['name']);
                            $ext_archivo = end($ext_archivo);;
                            if (in_array($ext_archivo, $extensions) === false) {
                                $error[] = "Extension no permitada, escoja un archivo con extension JPEG, PNG o JPG.";
                            }
                            if ($_FILES['foto']['size'] > 2097152) {
                                $error[] = "El archivo no debe pesar mas de 2MB";
                            }
                            if (empty($error)) {
                                $hora = round(microtime(true) * 1000);
                                $nombreFoto = $hora . "." . $ext_archivo;
                                move_uploaded_file($_FILES['foto']['tmp_name'], "Resources/Images/" . $nombreFoto);
                                $tecnico->setFoto($nombreFoto);
                                $tecnico->crear();
                                header("Location: index.php?pid=".base64_encode('presentacion/administrador/seccion.php')."&tipo=1");
                            }
                        }

                    }else{
                        $error[]="Numero de identificaion ya registrado";
                    }
                }else{
                    $error[]="Las claves no coinciden";
                }

            }else{
                $error[]="Correo ya registrado";
            }

        break;
        case '3':
            $administrador= new administrador("","",$nombre,$apellido,$identificacion,$correo,$clave);
            if($administrador->identificacion_libre()) {
                if($clave == $clave_repetir){
                    if ($administrador->correolibre()){
                        if (isset($_FILES['foto'])) {
                            $extensions = array("jpeg", "jpg", "png");
                            $ext_archivo = explode(".", $_FILES['foto']['name']);
                            $ext_archivo = end($ext_archivo);
                            if (in_array($ext_archivo, $extensions) === false) {
                                $error[] = "Extension no permitada, escoja un archivo con extension JPEG, PNG o JPG.";
                            }
                            if ($_FILES['foto']['size'] > 2097152) {
                                $error[] = "El archivo no debe pesar mas de 2MB";
                            }
                            if (empty($error)) {
                                $hora = round(microtime(true) * 1000);
                                $nombreFoto = $hora . "." . $ext_archivo;
                                move_uploaded_file($_FILES['foto']['tmp_name'], "Resources/Images/" . $nombreFoto);
                                $administrador->setFoto($nombreFoto);
                                $administrador->crear();
                                header("Location: index.php?pid=".base64_encode('presentacion/administrador/seccion.php')."&tipo=1");
                            }
                        }
                    }else{
                        $error[]="Numero de identificaion ya registrado";
                    }
                }else{
                    $error[]="Las claves no coinciden";
                }

            }else{
                $error[]="Correo ya registrado";
            }
            break;
    }
}

?>

<div class="contenedor-formulario ">
    <div class="wrap">
        <form class="formulario"
              name = "formulario_registro"
              enctype="multipart/form-data"
              action="index.php?pid=<?php echo base64_encode("presentacion/administrador/crear/crear.php");?>"
              method="post" >
            <?php
            if (!empty($error)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $error[0] ?></div>
            <?php }?>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <input type="text" name="nombre"  id="nombre" value="">
                                <label class="label" for="nombre">Nombre:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input type="text" name="apellido"  id="apellido" value="">
                                <label class="label" for="nombre">Apellidos:</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <input type="text" name="identificacion" id="textInput" value="">
                    <label class="label" for="nombre">Identificación:</label>
                </div>
                <div class="input-group">
                    <input type="email" name="correo"  id="textInput" value="">
                    <label class="label" for="nombre">Correo:</label>
                </div>
                <div class="input-group">
                    <input type="password" name="clave" id="textInput" value="">
                    <label class="label" for="nombre">Contraseña:</label>
                </div>
                <div class="input-group">
                    <input type="password" name="clave_repetir" required id="textInput1" value="">
                    <label class="label" for="nombre">
                        Repetir Contraseña:
                    </label>

                </div>

                <div class="input-group">
                    <div class="input-field col s12">
                        <label>ROLL: </label>
                        <select name="rol" id="sources" class="form-select">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="1">Usuario</option>
                            <option value="2">Administrador</option>
                            <option value="3">Técnico</option>
                        </select>

                    </div>
                </div>
                <div class="input-group text">
                    <label>Seleccione una foto</label>
                    <input type="file" name="foto" class="form-control" placeholder="Foto" required="required">
                </div>
                <button type="submit" class="btn btn-primary" name="registro"> Registrar </button>
            </div>
        </form>
    </div>
</div>



