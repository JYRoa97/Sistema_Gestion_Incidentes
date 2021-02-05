<?php
    include "presentacion/administrador/menu.php";
    if(isset($_GET['action']) and isset($_GET['id'])){
        if($_GET['action']=='d') {
            $usuiaro_d= new usuario("",$_GET['id'],"","","","","");
            $usuiaro_d->eliminar();
        }
    }
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
                            <th scope="col">Correo</th>
                            <th scope="col">Servicios </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $usuario){
                                    echo "<tr>";
                                    echo "<td>" .$usuario->getId() ."</td>";
                                    echo "<td>" .$usuario->getNombre() ."</td>";
                                    echo "<td>" .$usuario->getApellido() ."</td>";
                                    echo "<td>" .$usuario->getCorreo() ."</td>";
                                    echo "<td>"."<span><a href='indexAjax.php?pid=".base64_encode('presentacion/administrador/consultar/modalUsuario.php')."&id=".$usuario->getId()."' data-toggle='modal' data-target='#modalUsuario' ><span class='fas fa-eye fa-2x' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span></a>".
                                                "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/consultar/usuarios.php')."&action=d&id=".$usuario->getId()."'  ><span  style='color: red' class='fas fa-user-times fa-2x' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Borrar usuario' ></span></a>".
                                        "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/editar/usuario.php')."&id=".$usuario->getId()."'  ><span   class='fas fa-user-edit fa-2x' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Borrar usuario' ></span></a>".

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




