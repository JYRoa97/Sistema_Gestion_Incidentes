<?php
include "presentacion/administrador/menu.php";

if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $identificacion=$_POST['identificacion'];
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $rol=$_POST['rol'];
    $error= array();
    function foto($foto){

        return nombre;
    }

    switch ($rol){
        case '1':
            $usuario= new usuario("","",$nombre,$apellido,$identificacion,$correo,$clave);
            if ($usuario->correolibre()){
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
                        header("Location: index.php?pid=".base64_encode('presentacion/administrador/seccion.php')."&tipo=1");

                    }
                }


            }else{
                $error[]="Correo ya registrado";
            }
            break;
        case '2':
        $tecnico= new tecnico("","",$nombre,$apellido,$identificacion,$correo,$clave);
        if ($tecnico->correolibre()){
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
            $error[]="Correo ya registrado";
        }

        break;
        case '3':
            $administrador= new administrador("","",$nombre,$apellido,$identificacion,$correo,$clave);
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
                $error[]="Correo ya registrado";
            }
            break;
    }

}



?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card" style="margin-top: 100px;">
                <div class="card-header bg-primary text-white text-center py-4">Ingrese informacion de tecnico</div>
                <div class="card-body">
                    <form class="border border-light p-5"
                          enctype="multipart/form-data"
                          action="index.php?pid=<?php echo base64_encode("presentacion/administrador/crear/crear.php");?>"
                          method="post" >
                        <?php
                        if (!empty($error)) {?>
                            <div class="alert alert-danger" role="alert"><?php echo $error[0] ?></div>
                        <?php }?>

                        <input type="text" name="nombre" required id="textInput" class="form-control mb-4"
                               placeholder="Nombre" value="">

                        <input type="text" name="apellido" required id="textInput" class="form-control mb-4"
                               placeholder="Apellido" value="">

                        <input type="text" name="identificacion" required id="textInput" class="form-control mb-4"
                               placeholder="Identificacion" value="">

                        <input type="email" name="correo" required id="textInput" class="form-control mb-4"
                               placeholder="Correo" value="">

                        <input type="password" name="clave" required id="textInput" class="form-control mb-4"
                               placeholder="Clave" value="">

                        <input type="password" name="clave" required id="textInput" class="form-control mb-4"
                               placeholder="Clave" value="">

                        <div class="form-group" >
                            <label for="exampleFormControlSelect1">Seleccione rol</label>
                            <select  name="rol" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Usuario</option>
                                <option value="2">Tecnico</option>
                                <option value="3">Administrador</option>
                            </select>
                        </div>
                        <label>Seleccione una foto</label>
                        <div class="form-group">
                            <input type="file" name="foto" class="form-control" placeholder="Foto" required="required">
                        </div>
                        <button type="input" class="btn btn-primary" name="registro"> Crear Material</button>



                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
