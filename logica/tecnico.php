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
     function correolibre(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->correolibre());
        if ($this->conexion->numFilas()==0){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }

    }
     function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->crear());
        $this->conexion->cerrar();
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
        $this->tecnicoDAO->setFoto($foto);
    }
    
}