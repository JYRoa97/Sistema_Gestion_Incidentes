<?php


class usuarioDAO extends persona
{
    private $foto;
    function usuarioDAO($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }
    public function crear(){
        return "INSERT INTO 
                `usuario`( `nombre`, `apellido`, `identificacion`, `correo`, `clave`, `foto`) 
                    VALUES ('".$this->nombre."','".$this->apellido."','".$this->identificacion."','".$this->correo."',MD5('".$this->clave."'),'".$this->foto."')";

    }
    public function correolibre(){
        return "select * from usuario where usuario.correo='".$this->correo ."';";
    }
    public function identificacion_libre(){
        return "select * from usuario where usuario.identificacion='".$this->identificacion ."';";
    }
    public function  consultar_todos(){
        return "Select * from usuario";
    }
    public function consultar(){
        return "Select * from usuario where usuario.idusuario=".$this->id;
    }
    public function eliminar(){
        return"Delete from usuario where usuario.idusuario=".$this->id;
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