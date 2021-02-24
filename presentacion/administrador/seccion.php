<?php
include "menu.php";
$administrador= new administrador("",$_SESSION['id'],"","","","","");
$administrador= $administrador->consultar();
?>
<title>Administrador: SGI</title>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <div class="card">
                    <?php if(isset($_GET['tipo']) and $_GET['tipo'] == 1){?>
                    <div class="alert alert-success" role="alert">
                        Se registro exitosamente
                    </div>
                    <?php }?>
                    <?php if(isset($_GET['tipo']) and $_GET['tipo'] == 2){?>
                    <div class="alert alert-success" role="alert">
                        Se registro visita exitosamente
                    </div>
                <?php }?>
                <?php if(isset($_GET['tipo']) and $_GET['tipo'] == 3){?>
                    <div class="alert alert-success" role="alert">
                        Se registro numero de teléfono exitosamente
                    </div>
                <?php }?>
                <div class="card-header bg-primary text-white"><h4>Bienvenido Administrador</h4></div>
                <div class="card-body">
                    <div class="card mb-1 bg-dark" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="center" src="Resources/Images/<?php echo $administrador->getFoto()?>" alt="..." height="150" width="150">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body ">
                                    <h6 class="card-title ">Datos:</h6>
                                    <p class="card-text" style="color: white"><p style="color: white"><?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></p>
                                    <p style="color: white"><?php echo $administrador -> getCorreo(); ?></p>
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
