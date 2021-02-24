<?php
include "menu.php";
$usuario= new usuario("",$_SESSION['id'],"","","","","");
$usuario= $usuario->consultar();
?>
<title>Usuario: SGI</title>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <div class="card ">
                <?php if(isset($_GET['tipo']) and $_GET['tipo'] == 1){?>
                    <div class="alert alert-success" role="alert">
                        Se registro con exitó el incidente
                    </div>
                <?php }?>
                <div class="card-header bg-primary text-white"><h4>Bienvenido Usuario</h4> </div>
                <div class="card-body">
                    <div class="card mb-2 bg-dark" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img class="center" src="Resources/Images/<?php echo $usuario->getFoto()?>" alt="..." width="150" height="150">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body ">
                                    <h6 class="card-title ">Datos:</h6>
                                    <p class="card-text" style="color: white"><p style="color: white"><?php echo $usuario -> getNombre() . " " . $usuario -> getApellido() ?></p>
                                    <p style="color: white"><?php echo $usuario -> getCorreo(); ?></p>
                                    <p style="color: white">Hoy es: <?php echo date("d-M-Y"); ?></p></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>