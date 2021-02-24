<?php


class tecnicoDAO extends persona
{
    private $foto;
    function tecnicoDAO($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }
    public function autenticar(){
        return "SELECT * FROM 
                tecnico 
                WHERE tecnico.correo='".$this->correo."' and tecnico.clave=MD5('".$this->clave."')";

    }
    public function traerid(){
        return "SELECT tecnico.idusuario FROM `tecnico` WHERE tecnico.correo='".$this->correo."' AND tecnico.clave=MD5('".$this->clave."')";

    }

    public function crear(){
        return "INSERT INTO 
                `tecnico`( `nombre`, `apellido`, `identificacion`, `correo`, `clave`, `foto`) 
                    VALUES ('".$this->nombre."','".$this->apellido."','".$this->identificacion."','".$this->correo."',MD5('".$this->clave."'),'".$this->foto."')";

    }
    public function correolibre(){
        return "select * from tecnico where tecnico.correo='".$this->correo ."';";
    }
    public function identificacion_libre(){
        return "select * from tecnico where tecnico.identificacion='".$this->identificacion ."';";
    }
    public function  consultar_todos(){
        return "Select * from tecnico";
    }
    public function consultar(){
        return "Select * from tecnico where tecnico.idusuario=".$this->id;
    }
    public function eliminar(){
        return"Delete from tecnico where tecnico.idusuario=".$this->id;
    }
    public function  actualizar(){
        return "UPDATE `tecnico` 
                SET `idusuario`=".$this->id.",
                    `nombre`='".$this->nombre."',
                    `apellido`='".$this->apellido."',
                    `identificacion`='".$this->identificacion."',
                    `correo`='".$this->correo."',
                    `foto`='".$this->foto."' WHERE`idusuario`=".$this->id;

    }
    public function cambiar_contraseña(){
        return "UPDATE `tecnico` 
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