<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/tecnico/seccion.php") ?>">
                <img src="Resources\Images\iconos\home.png" alt="" width="30" height="24">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consultar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/tecnico/consultar/visitas.php")?>">
                                Visitas</a></li>
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