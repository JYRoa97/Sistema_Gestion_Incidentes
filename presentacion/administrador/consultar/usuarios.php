<?php
    include "presentacion/administrador/menu.php";
    $usua= new usuario("","","","","","","");
    $usuarios= $usua->consultar_todos();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: 20px">
                <div class="card-header bg-primary text-white">Consultar Usuarios</div>
                <div class="card-body">
                    <table class="table table-striped table-hover" >
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Foto</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $usuario){
                                    echo "<tr>";
                                    echo "<td>" .$usuario->getId() ."</td>";
                                    echo "<td>" .$usuario->getNombre() ."</td>";
                                    echo "<td>" .$usuario->getApellido() ."</td>";
                                    echo "<td>" .$usuario->getIdentificacion() ."</td>";
                                    echo "<td>" .$usuario->getCorreo() ."</td>";
                                echo "<td>" .$usuario->getFoto() ."</td>";
                                    echo "</tr>";
                                }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
