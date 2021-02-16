<?php


class usuarioDAO extends persona
{
    private $foto;
    function usuarioDAO($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }
    public function autenticar(){
        return "SELECT * FROM 
                usuario 
                WHERE usuario.correo='".$this->correo."' and usuario.clave=MD5('".$this->clave."')";

    }
    public function traerid(){
        return "SELECT usuario.idusuario FROM `usuario` WHERE usuario.correo='".$this->correo."' AND usuario.clave=MD5('".$this->clave."')";

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
    public function  actualizar(){
        return "UPDATE `usuario` 
                SET `idusuario`=".$this->id.",
                    `nombre`='".$this->nombre."',
                    `apellido`='".$this->apellido."',
                    `identificacion`='".$this->identificacion."',
                    `correo`='".$this->correo."',
                    `foto`='".$this->foto."' WHERE`idusuario`=".$this->id;

    }
    public function cambiar_contraseña(){
        return "UPDATE `usuario` 
                SET `idusuario`=".$this->id.",
                    `clave`=MD5('".$this->clave."')
                     WHERE`idusuario`=".$this->id;
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