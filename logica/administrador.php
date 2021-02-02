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
    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->crear());
        $this->conexion->cerrar();
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
    public function correolibre(){
         $this->conexion->abrir();
         $this->conexion->ejecutar($this->administradorDAO->correolibre());
        if ($this->conexion->numFilas()==0){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }

    }
    public  function traerid(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->traerid());
        $resultado = $this->conexion->extraer();
        return $resultado[0];
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
        $this->administradorDAO->setFoto($foto);
    }


}