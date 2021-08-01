<?php
    include "presentacion/administrador/menu.php";
    include "Lib/HashTable.php";
    if(isset($_GET['action']) and isset($_GET['id'])){
        if($_GET['action']=='d') {
            $usuiaro_d= new usuario("",$_GET['id'],"","","","","");
            $usuiaro_d->eliminar();
        }
    }
    $usua= new usuario("","","","","","","");
    $usuarios= $usua->consultar_todos();
    $tablaHash = new HashTable();
    $tiempoinicial = microtime(True);
    foreach ($usuarios as $user){
        //$tiempoinicial1 = microtime(True);
        $tablaHash->insert($user->getId(),$user);
        //$tiempoFinal1 = microtime(true);
    }
    $tiempoFinal = microtime(true);
    //$tiempoinicial1 = microtime(True);
    //$nombre = $tablaHash->find('965')->getCorreo();
    //$tiempoFinal1 = microtime(true);


?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-top: 20px">
                <div class="card-header bg-primary text-white"><h4>Consultar Usuarios</h4> </div>
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
                            //echo $tiempoFinal-$tiempoinicial;
                            //echo $tiempoFinal1-$tiempoinicial1;

                            //echo $tiempoFinal1-$tiempoinicial1;
                            //echo $nombre;
                            //echo $tablaHash->hashfunc('5');
                            foreach ($usuarios as $usuario){
                                    echo "<tr>";
                                    echo "<td>" .$usuario->getId() ."</td>";
                                    echo "<td>" .$usuario->getNombre() ."</td>";
                                    echo "<td>" .$usuario->getApellido() ."</td>";
                                    echo "<td>" .$usuario->getCorreo() ."</td>";
                                    echo "<td>"."<span><a href='indexAjax.php?pid=".base64_encode('presentacion/administrador/consultar/modalUsuario.php')."&id=".$usuario->getId()."' data-toggle='modal' data-target='#modalUsuario' ><span class='fas fa-eye fa-2x' data-toggle='tooltip' data-placement='top' title='Ver detalle' ></span></a>".
                                                "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/consultar/usuarios.php')."&action=d&id=".$usuario->getId()."'  ><span  style='color: red' class='fas fa-user-times fa-2x' data-toggle='tooltip' data-placement='top' title='Eliminar usuario' ></span></a>".
                                        "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/editar/usuario.php')."&id=".$usuario->getId()."'  ><span   class='fas fa-user-edit fa-2x' data-toggle='tooltip' data-placement='top' title='Editar usuario' ></span></a>".
                                        "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/editar/password_usuario.php')."&id=".$usuario->getId()."'  ><span   class='fas fa-key fa-2x' style='color: #20c997;' data-toggle='tooltip' data-placement='top' title='Cambiar contraseña ' ></span></a>".
                                        "<span><a href='index.php?pid=".base64_encode('presentacion/administrador/agregar/telefono.php')."&id=".$usuario->getId()."'  ><span   class='fas fa-phone fa-2x' style='color: chartreuse;' data-toggle='tooltip' data-placement='top' title='Agregar telefonos ' ></span></a>".
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




