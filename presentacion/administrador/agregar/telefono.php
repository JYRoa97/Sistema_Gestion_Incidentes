<?php
include "presentacion/administrador/menu.php";
if(isset($_POST['registro'])){
    $telefono=$_POST['telefono'];
    $id_u=$_GET['id'];
    $telefono = new telefono("",$telefono,$id_u);
    $telefono->crear();
    header("Location: index.php?pid=" . base64_encode('presentacion/administrador/seccion.php') . "&tipo=3");
}

?>

<div class="contenedor-formulario ">
    <div class="wrap">
        <form class="formulario"
              name = "formulario_registro"
              enctype="multipart/form-data"
              action="index.php?pid=<?php echo base64_encode("presentacion/administrador/agregar/telefono.php");?>&id=<?php echo $_GET['id'] ?>";
              method="post" >
            <?php
            if (!empty($error)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $error[0] ?></div>
            <?php }?>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: #0d0d0d">Numero de telefono</label>
                <input  class="form-control" type="text" id="datepicker" name="telefono" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registro"> Agregar </button>
        </form>
    </div>
</div>
