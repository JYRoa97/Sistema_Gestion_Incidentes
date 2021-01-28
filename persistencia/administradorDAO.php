<?php


class administradorDAO extends persona
{
    private $foto;
     function administradorDAO($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }

    public function autenticar(){
         return "SELECT * FROM 
                administrador 
                WHERE administrador.correo='".$this->correo."' and administrador.clave=MD5('".$this->clave."')";

    }
}
