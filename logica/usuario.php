<?php


class usuario extends persona
{
    private $foto;
    private $usuarioDAO;
    private $conexion;


    function usuario($foto="", $id="", $nombre="", $apellido="", $identificacion="", $correo="", $clave="")
    {
        $this->usuarioDAO= new usuarioDAO($foto, $id, $nombre, $apellido, $identificacion, $correo, $clave);
        $this->conexion= new Conexion;
        $this->foto = $foto;
        $this->persona($id,$nombre,$apellido,$identificacion,$correo,$clave);
    }
    public function autenticar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->autenticar());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }

    }
    public  function traerid(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->traerid());
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }
    public function correolibre(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->correolibre());
        $registro = $this->conexion->extraer();
        if ($this->conexion->numFilas()==0){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }

    }
    public function cambiar_contraseña(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->cambiar_contraseña());
        $this->conexion->cerrar();
    }
    public function actualizar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->actualizar());
        $this->conexion->cerrar();
    }
    public function identificacion_libre(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->identificacion_libre());
        if ($this->conexion->numFilas()==0){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return  false;
        }
    }

    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->crear());
        $this->conexion->cerrar();
    }


    public function find(){

    }

    public  function consultar_todos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->consultar_todos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new usuario($registro[6], $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->consultar());
        $registro = $this->conexion->extraer();
        $usuario = new usuario($registro[6], $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5]);
        $this->conexion->cerrar();
        return $usuario;
    }
    public function eliminar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->eliminar());
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
        $this->usuarioDAO->setFoto($foto);
    }
    
    
}