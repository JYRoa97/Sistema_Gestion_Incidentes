<?php
include "presentacion/usuario/menu.php";
if(isset($_POST['registro'])){
    $descripcion=$_POST['descripcion'];
    $fecha=$_POST['fecha'];
    $direccion=$_POST['direccion'];
    $detalle_direccion=$_POST['detalle_direccion'];
    $incidente = new incidente("",$descripcion,1,$fecha,$direccion,$detalle_direccion,$_SESSION['id']);
    $incidente->crear();
    header("Location: index.php?pid=" . base64_encode('presentacion/usuario/seccion.php') . "&tipo=1");

}

?>

<div class="contenedor-formulario ">
    <div class="wrap">
        <form class="formulario"
              name = "formulario_registro"
              enctype="multipart/form-data"
              action="index.php?pid=<?php echo base64_encode("presentacion/usuario/crear/incidente.php");?>"
              method="post" >
            <?php
            if (!empty($error)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $error[0] ?></div>
            <?php }?>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: #0d0d0d">Descripcion de incidente</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: #0d0d0d">Fecha de incidente</label>
                <input  class="form-control" type="text" id="datepicker" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: #0d0d0d">Direccion</label>
                <input  type="text" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: #0d0d0d">Detalle de direccion</label>
                <input  type="text" name="detalle_direccion">
            </div>
            <button type="submit" class="btn btn-primary" name="registro"> Registrar </button>
        </form>
    </div>
</div>
<script>
    $(function(){
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
