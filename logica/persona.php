<?php


class persona
{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $identificacion;
    protected $correo;
    protected $clave;

    function persona($id="",$nombre="",$apellido="",$identificacion="",$correo="",$clave=""){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->identificacion=$identificacion;
        $this->correo=$correo;
        $this->clave=$clave;

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


}