<?php


class administrador extends persona
{
    private $foto;
    private $administradorDAO;
    private $conexion;
     function administrador($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->administradorDAO= new AdministradorDAO($foto, $id, $nombre, $apellido, $identificacion, $correo, $clave);
        $this->conexion= new Conexion;
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }
    public function autenticar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->autenticar());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }


    }

}