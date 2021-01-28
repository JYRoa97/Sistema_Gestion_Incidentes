<?php


class tecnico extends persona
{
    private $foto;
    private $tecnicoDAO;
    private $conexion;

    function tecnico($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->tecnicoDAO= new tecnicoDAO($foto, $id, $nombre, $apellido, $identificacion, $correo, $clave);
        $this->conexion= new Conexion;
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }

    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->crear());
        $this->conexion->cerrar();
    }
}