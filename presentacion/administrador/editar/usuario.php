<?php
include "presentacion/administrador/menu.php";
$usuariob= new usuario("",$_GET['id'],"","","","","");
$usuariob=$usuariob->consultar();
if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $identificacion=$_POST['identificacion'];
    $correo=$_POST['correo'];
    $error= array();
            $usuario= new usuario("",$_GET['id'],$nombre,$apellido,$identificacion,$correo,"");
            if ($usuariob->getCorreo() === $correo   or $usuario->correolibre() ){
                    if($usuariob->getIdentificacion() === $identificacion or $usuario->identificacion_libre()) {
                        if (isset($_FILES['foto']) and $_FILES['foto']['name'] != null ) {
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
                                unlink("Resources/Images/".$usuariob->getFoto());
                                $usuario->setFoto($nombreFoto);
                                $usuario->actualizar();
                                header("Location: index.php?pid=" . base64_encode('presentacion/administrador/seccion.php') . "&tipo=1");

                            }

                        }else{
                            $usuario->setFoto($usuariob->getFoto());
                            $usuario->actualizar();
                            header("Location: index.php?pid=" . base64_encode('presentacion/administrador/seccion.php') . "&tipo=1");
                        }



                    }else{
                        $error[]="Numero de identificaion ya registrado";
                    }

            }else{
                $error[]="Correo ya registrado";
            }
}


?>


<div class="contenedor-formulario ">
    <div class="wrap">
        <form class="formulario"
              name = "formulario_registro"
              enctype="multipart/form-data"
              action="index.php?pid=<?php echo base64_encode("presentacion/administrador/editar/usuario.php");?>&id=<?php echo $_GET['id'] ?>"
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
                                <input type="text" name="nombre"  id="nombre" value="<?php echo $usuariob->getNombre()?>">
                                <label class="label" for="nombre">Nombre:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input type="text" name="apellido"  id="apellido" value="<?php echo $usuariob->getApellido()?>">
                                <label class="label" for="nombre">Apellidos:</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <input type="text" name="identificacion" id="textInput" value="<?php echo $usuariob->getIdentificacion()?>">
                    <label class="label" for="nombre">Identificación:</label>
                </div>
                <div class="input-group">
                    <input type="email" name="correo"  id="textInput" value="<?php echo $usuariob->getCorreo()?>">
                    <label class="label" for="nombre">Correo:</label>
                </div>
                <div class="input-group text">
                    <label>Seleccione una foto</label>
                    <input type="file" name="foto" class="form-control" placeholder="Foto" >
                </div>
                <button type="submit" class="btn btn-primary" name="registro"> Registrar </button>
            </div>
        </form>
    </div>
</div>
