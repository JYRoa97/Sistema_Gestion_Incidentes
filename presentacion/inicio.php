<?php

?>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <h5 class="active"> Sign In </h5>
        <!-- Icon -->
        <div class="row">
            <div class="fadeIn first">
                <img src="Resources/Images/iconos/soporte-tecnico.png" class="img-thumbnail" alt="..." width="120" height="120" viewBox="0 0 16 16">
            </div>
        </div>
        <div class="row">
        <!-- Login Form -->
        <form class="form-signin"  method="post" action="index.php?pid=<?php echo base64_encode("presentacion/validar.php") ?>&sa=true">
            <h1 class="h3 mb-3 font-weight-normal">HTv Soporte Técnico</h1>
            <?php if(isset($_GET['auth'])){?>
                <div class="alert alert-danger" role="alert">
                    Correo o clave incorrectos.
                </div>
            <?php }?>
            <!--Campo de correo-->

            <div class="mb-3 row">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <input type="email" name="correo" id="inputEmail" class="form-control" placeholder="Correo electronico" required autofocus="" title="Ingrese correo" />

                    </div>
                </div>
            </div>
            <!--Campo de contraseña-->

            <div class="mb-3 row">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <input type="password" name="clave" id="inputEmail" class="form-control" placeholder="Contraseña" required autofocus="" title="Ingrese Contraseña" />

                    </div>
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block btn-ingreso" type="submit">
                Ingresar
            </button>
        </form>
        </div>

    </div>
</div>


