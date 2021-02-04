<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/seccion.php") ?>">
                <img src="Resources\Images\home.png" alt="" width="30" height="24">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Crear
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/crear/crear.php")?>">Crear usuarios</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consultar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/consultar/usuarios.php")?>">Usuarios</a></li>
                        <li><a class="dropdown-item" href="#">Tecnicos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Incidentes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Consultar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php">
                        SALIR
                    </a>
                    
                </li>

            </ul>

        </div>
    </div>
</nav>