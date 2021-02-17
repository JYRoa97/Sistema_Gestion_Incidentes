<?php
include "presentacion/administrador/menu.php";
if(isset($_GET['action']) and isset($_GET['id'])){
    if($_GET['action']=='d') {
        $tecnico_d= new tecnico("",$_GET['id'],"","","","","");
        $tecnico_d->eliminar();
    }
}
$tecn= new tecnico("","","","","","","");
$tecnicos= $tecn->consultar_todos();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: 20px">
                <div class="card-header bg-primary text-white"><h4>Consultar Técnicos</h4> </div>
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
                                "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/consultar/tecnicos.php')."&action=d&id=".$tecnico->getId()."'  ><span  style='color: red' class='fas fa-user-times fa-2x' data-toggle='tooltip' data-placement='top' title='Eliminar usuario' ></span></a>".
                                "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/editar/tecnico.php')."&id=".$tecnico->getId()."'  ><span   class='fas fa-user-edit fa-2x' data-toggle='tooltip' data-placement='top' title='Editar usuario' ></span></a>".
                                "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/editar/password_tecnico.php')."&id=".$tecnico->getId()."'  ><span   class='fas fa-key fa-2x' style='color: #20c997;' data-toggle='tooltip' data-placement='top' title='Cambiar contraseña ' ></span></a>".
                                "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/agregar/telefono_t.php')."&id=".$tecnico->getId()."'  ><span   class='fas fa-phone fa-2x' style='color: chartreuse;' data-toggle='tooltip' data-placement='top' title='Agregar telefonos ' ></span></a>".
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