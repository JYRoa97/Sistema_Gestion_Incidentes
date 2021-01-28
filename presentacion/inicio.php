
<div class="container  col-6" >
    <body class="text-center" >
    <form class="form-signin"  method="post" action="index.php?pid=<?php echo base64_encode("presentacion/validar.php") ?>">
        <div class="mb-4 logo">
            <a href=""></i></a>
        </div>
        <div>

            <h1 class="h3 mb-3 font-weight-normal">Sistema de gestion</h1>
            <?php if(isset($_GET['auth'])){?>
                <div class="alert alert-danger" role="alert">
                    Correo o clave incorrectos.
                </div>
            <?php }?>
            <!--Campo de correo-->
            <div class="input-group mb-3">
                <div class="input-group-prepend email">
                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                </div>
                <input type="email" name="correo" id="inputEmail" class="form-control" placeholder="Correo electronico" required autofocus="" title="Ingrese correo" />
            </div>

            <!--Campo de contraseña-->
            <div class="input-group mb-3 contr">
                <div class="input-group-prepend pass">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="clave" id="inputEmail" class="form-control" placeholder="Contraseña" required autofocus="" title="Ingrese Contraseña" />
            </div>


            <button class="btn btn-lg btn-primary btn-block btn-ingreso" type="submit">
                Ingresar
            </button>

        </div>

    </form>
    </body>

</div>


