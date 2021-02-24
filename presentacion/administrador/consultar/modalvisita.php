<?php
$incidente= new incidente($_GET['id_in'],"","","","","","");
$incidente=$incidente->consultar();
$usuario= new usuario("",$incidente->getIdUsuario(),"","","","","");
$usuario= $usuario->consultar();
$visita = new visita("","","",$incidente->getId(),"","");
$visita= $visita->consultar();
$tecnico = new tecnico("",$visita->getIdTecnico(),"","","","","");
$tecnico = $tecnico->consultar();
$telefonou= new telefono("","",$usuario->getId());
$telefonot= new telefono("","",$tecnico->getId());
$telefonou= $telefonou->consultar();
$telefonot= $telefonot->consultar_t_t();

?>

<div class="modal-header bg-primary text-white">
    <h5 class="modal-title text-center " id="exampleModalLabel">Detalle incidente y visita</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="user-info-modal">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Descripción de incidente</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo  $incidente->getDescripcion();
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Dirección</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $incidente->getDireccion();
                ?>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Detalle de dirección</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $incidente->getDetalleDireccion();
                ?>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Nombre usuario</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $usuario->getNombre()." ".$usuario->getApellido();
                ?>

            </div>
        </div>
        <hr>
        <div class="phone">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="mb-0">Teléfonos usuarios</h6>
                </div>
                <div class="col-sm-8">
                    <?php
                    foreach ($telefonou as $telefono){
                        echo $telefono->getTelefono()."<br>";
                    }
                    ?>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Fecha de visita</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $visita->getFecha();
                ?>

            </div>
        </div>
        <hr>
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <div class="col-sm-3">
                    <h6 class="mb-0">FOTO TÉCNICO</h6>
                </div>
                <img src="Resources/Images/<?php echo $tecnico->getFoto()?>" alt=""
                     width="150" height="150">
                <div class="mt-3"><h4></h4>
                    <p class="text-muted font-size-sm"> </p></div>
                <p class="text-secondary mb-1"> </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Nombre de técnico</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                echo $tecnico->getNombre()." ".$tecnico->getApellido();
                ?>

            </div>
        </div>
        <hr>
        <div class="phone">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="mb-0">Teléfonos técnico</h6>
                </div>
                <div class="col-sm-8">
                    <?php
                    foreach ($telefonot as $telefono){
                        echo $telefono->getTelefono()."<br>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
</div>