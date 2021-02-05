<?php


class administradorDAO extends persona
{
    private $foto;
     function administradorDAO($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }
    public function crear(){
        return "INSERT INTO 
                `administrador`( `nombre`, `apellido`, `identificacion`, `correo`, `clave`, `foto`) 
                    VALUES ('".$this->nombre."','".$this->apellido."','".$this->identificacion."','".$this->correo."',MD5('".$this->clave."'),'".$this->foto."')";

    }
    public function autenticar(){
         return "SELECT * FROM 
                administrador 
                WHERE administrador.correo='".$this->correo."' and administrador.clave=MD5('".$this->clave."')";

    }

    public function correolibre(){
        return "select * from administrador where administrador.correo='".$this->correo ."';";
    }

    public function traerid(){
        return "SELECT administrador.idusuario FROM `administrador` WHERE administrador.correo='".$this->correo."' AND administrador.clave=MD5('".$this->clave."')";

    }

    public function identificacion_libre(){
        return "select * from administrador where administrador.identificacion='".$this->identificacion ."';";
    }
    /**
     * @return mixed|string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed|string $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

}
