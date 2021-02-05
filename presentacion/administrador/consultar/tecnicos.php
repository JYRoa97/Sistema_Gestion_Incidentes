<?php
include "presentacion/administrador/menu.php";
$tecn= new tecnico("","","","","","","");
$tecnicos= $tecn->consultar_todos();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: 20px">
                <div class="card-header bg-primary text-white">Consultar Técnicos</div>
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
                        foreach ($tecnicos as $tecnico){
                            echo "<tr>";
                            echo "<td>" .$tecnico->getId() ."</td>";
                            echo "<td>" .$tecnico->getNombre() ."</td>";
                            echo "<td>" .$tecnico->getApellido() ."</td>";
                            echo "<td>" .$tecnico->getIdentificacion() ."</td>";
                            echo "<td>" .$tecnico->getCorreo() ."</td>";
                            echo "<td>" .$tecnico->getFoto() ."</td>";
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