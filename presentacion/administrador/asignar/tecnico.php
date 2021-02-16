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
                            <th scope="col">Servicios</th>
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
                            echo "<td>"."<span><a href='indexAjax.php?pid=".base64_encode('presentacion/administrador/consultar/modalTecnico.php')."&id=".$tecnico->getId()."' data-toggle='modal' data-target='#modalUsuario' ><span class='fas fa-eye fa-2x' data-toggle='tooltip' data-placement='top' title='Ver detalle' ></span></a>".
                                        "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/asignar/fecha.php')."&id_in=".$_GET['id']."&id_t=".$tecnico->getId()."'><span  style='color: green' class='fas fa-user-plus fa-2x' data-toggle='tooltip' data-placement='top' title='Asignar tecnico al incidente' ></span></a>".
                                "</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="modal fade" id="modalUsuario" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" id="modalContent">
                            </div>
                        </div>
                    </div>
                    <script>
                        $('body').on('show.bs.modal', '.modal', function (e) {
                            var link = $(e.relatedTarget);
                            $(this).find(".modal-content").load(link.attr("href"));
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
