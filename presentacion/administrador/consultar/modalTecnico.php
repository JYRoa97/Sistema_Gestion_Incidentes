<?php
$tecnico= new tecnico("",$_GET['id'],"","","","","");
$tecnico=$tecnico->consultar();
$telefonos= new telefono("","",$tecnico->getId());
$telefonos=$telefonos->consultar_t_t()


?>

<div class="modal-header bg-primary text-white">
    <h5 class="modal-title text-center" id="exampleModalLabel">  Información de Técnico</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="user-info-modal">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="Resources/Images/<?php echo $tecnico->getFoto()?>" alt=""
                 class="rounded-circle" width="150">
            <div class="mt-2">
                <p class="text-muted font-size-sm"> </p></div>
            <p class="text-secondary mb-1"> </p>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Nombre completo:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $tecnico->getNombre() ." ". $tecnico->getApellido();
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Correo:</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $tecnico->getCorreo()
                ?>

            </div>
        </div>
        <hr>
        <div class="phone">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Teléfonos:</h6>
                </div>
                <div class="col-sm-9">
                    <?php
                    foreach ($telefonos as $telefono){
                        echo $telefono->getTelefono()."<br>";
                    }
                    ?>

                </div>

            </div>
        </div>
        <hr>
        <div class="phone">
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Identificación:</h6>
                </div>
                <div class="col-sm-9 ">
                    <?php
                    echo $tecnico->getIdentificacion();
                    ?>

                </div>
            </div>
        </div>
        <hr>

    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary " data-dismiss="modal">Cerrar</button>
</div>
</div>