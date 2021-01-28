<?php
include "presentacion/administrador/menu.php";

if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $identificacion=$_POST['identificacion'];
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $tecnico= new tecnico("","",$nombre,$apellido,$identificacion,$correo,$clave);
    $tecnico->crear();

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
                          action="index.php?pid=<?php echo base64_encode("presentacion/administrador/tecnico/crear_tecnico.php");?>"
                          method="post">
<!--                        --><?php //if($error == 1){?>
<!--                            <div class="alert alert-danger" role="alert">Material ya existente.</div>-->
<!--                        --><?php //}else if ($error == 0){ ?>
<!--                            <div class="alert alert-success" role="alert">Material Creado</div>-->
<!--                        --><?php //}?>

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

                        <button type="input" class="btn btn-primary" name="registro"> Crear Material</button>



                    </form>
                </div>
            </div>
        </div>

    </div>
</div>