<?php
include "presentacion/administrador/menu.php";
if(isset($_POST['registro'])){
    $fecha=$_POST['fecha'];
    $id_in=$_GET['id_in'];
    $id_t=$_GET['id_t'];
    $visita = new visita("",1,$fecha,$id_in,$_SESSION['id'],$id_t);
    $visita->crear();
    $incidente= new incidente($id_in,"",2,"","","","");
    $incidente->cambiar_estado();
    header("Location: index.php?pid=" . base64_encode('presentacion/administrador/seccion.php') . "&tipo=2");
}

?>

<div class="contenedor-formulario ">
    <div class="wrap">
        <form class="formulario"
              name = "formulario_registro"
              enctype="multipart/form-data"
              action="index.php?pid=<?php echo base64_encode("presentacion/administrador/asignar/fecha.php");?>&id_in=<?php echo $_GET['id_in'] ?>&id_t=<?php echo $_GET['id_t']?>";
              method="post" >
            <?php
            if (!empty($error)) {?>
                <div class="alert alert-danger" role="alert"><?php echo $error[0] ?></div>
            <?php }?>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color: #0d0d0d">Fecha de visita</label>
                <input  class="form-control" type="text" id="datepicker" name="fecha" required>
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