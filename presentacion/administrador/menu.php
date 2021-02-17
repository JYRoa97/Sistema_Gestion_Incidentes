<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/seccion.php") ?>">
                <img src="Resources\Images\iconos\home_2.png" alt="" width="30" height="24">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Registrar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/crear/crear.php")?>">
                                Nuevo</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consultar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultar/usuarios.php")?>">
                                Usuarios</a></li>
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultar/tecnicos.php")?>">
                                Tecnicos</a></li>
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultar/incidentes.php")?>">
                                Incidentes</a></li>
                    </ul>
                </li>




        </div>
        <a class="btn btn-outline-success" href="index.php" role="button">Salir</a>
    </div>
</nav>