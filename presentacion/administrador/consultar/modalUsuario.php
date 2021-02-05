<?php
$usuario= new usuario("",$_GET['id'],"","","","","");
$usuario=$usuario->consultar();
if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $identificacion=$_POST['identificacion'];
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $rol=$_POST['rol'];
    $clave_repetir = $_POST['clave_repetir'];
    $error= array();

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
}

?>

<div class="modal-header">
    <h5 class="modal-title text-center" id="exampleModalLabel">Información de Usuario</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="user-info-modal">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="Resources/Images/<?php echo $usuario->getFoto()?>" alt=""
                 class="rounded-circle" width="150">
            <div class="mt-3"><h4></h4>
                <p class="text-muted font-size-sm"> </p></div>
            <p class="text-secondary mb-1"> </p>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Nombre completo</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $usuario->getNombre() ." ". $usuario->getApellido();
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Correo</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $usuario->getCorreo()
                ?>

            </div>
        </div>
        <hr>
        <div class="phone">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="mb-0">Telefonos</h6>
                </div>
                <div class="col-sm-8">


                </div>

            </div>
        </div>
        <hr>
        <div class="phone">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="mb-0">Identificacion</h6>
                </div>
                <div class="col-sm-8">
                    <?php
                        echo $usuario->getIdentificacion();
                    ?>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6"><h6 class="mb-0"></h6>
            </div>
            <div class="col-sm-6 text-secondary"></div>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
</div>




