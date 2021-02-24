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
    public function autenticar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->autenticar());
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
        $this->conexion->ejecutar($this->tecnicoDAO->traerid());
        $resultado = $this->conexion->extraer();
        return $resultado[0];
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

    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->consultar());
        $registro = $this->conexion->extraer();
        $tecnico = new tecnico($registro[6], $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5]);
        $this->conexion->cerrar();
        return $tecnico;
    }
    public function eliminar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->eliminar());
        $this->conexion->cerrar();
    }
    public function actualizar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->actualizar());
        $this->conexion->cerrar();
    }
    public function cambiar_contraseña(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tecnicoDAO->cambiar_contraseña());
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

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed|string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed|string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed|string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed|string
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @param mixed|string $identificacion
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    /**
     * @return mixed|string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed|string $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed|string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed|string $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }


}