<?php
include "presentacion/usuario/menu.php";
$inci= new incidente("","","","","","",$_SESSION['id']);
$incidentes = $inci->consultar_por_usuario();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: 20px">
                <div class="card-header bg-primary text-white">Consultar mis incidentes</div>
                <div class="card-body">
                    <table class="table table-striped table-hover" >
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Direccion </th>
                            <th scope="col">Detalle de direccion </th>
                            <th scope="col">Servicios </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($incidentes as $incidente){
                            echo "<tr>";
                            echo "<td>" .$incidente->getId() ."</td>";
                            echo "<td>" .$incidente->getDescripcion() ."</td>";
                            if($incidente->getEstado()==1){
                                echo "<td>" .

                                    "<span  style='color: yellow' class='fas fa-folder fa-2x' data-toggle='tooltip' data-placement='top' title='Se creo incidente' ></span>"

                                    ."</td>";
                            }else if($incidente->getEstado()==2){
                                echo "<td>" .

                                    "<span  style='color: green' class='fas fa-calendar-check fa-2x' data-toggle='tooltip' data-placement='top' title='Se asigno visita' ></span>"

                                    ."</td>";

                            }else if($incidente->getEstado()==3){
                                echo "<td>" .

                                    "<span  style='color: green' class='fas fa-check fa-2x' data-toggle='tooltip' data-placement='top' title='Se resolvio incidente' ></span>"

                                    ."</td>";

                            }
                            echo "<td>" .$incidente->getFecha() ."</td>";
                            echo "<td>" .$incidente->getDireccion() ."</td>";
                            echo "<td>" .$incidente->getDetalleDireccion() ."</td>";
                            if($incidente->getEstado()==2 or $incidente->getEstado()==3){
                                echo"<td><span><a href='indexAjax.php?pid=".base64_encode('presentacion/administrador/consultar/modalvisita.php')."&id_in=".$incidente->getId()."' data-toggle='modal' data-target='#modalUsuario' ><span class='fas fa-eye fa-2x' data-toggle='tooltip' data-placement='top' title='Ver detalle' ></span></a></td>";
                            }
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
