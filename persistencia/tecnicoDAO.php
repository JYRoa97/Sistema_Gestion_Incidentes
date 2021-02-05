<?php


class tecnicoDAO extends persona
{
    private $foto;
    function tecnicoDAO($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
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