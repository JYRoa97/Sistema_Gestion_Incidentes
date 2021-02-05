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
    public function identificacion_libre(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->identificacion_libre());
        if ($this->conexion->numFilas()==0){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }
    }

    public  function consultar_todos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->consultar_todos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new usuario($registro[6], $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
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