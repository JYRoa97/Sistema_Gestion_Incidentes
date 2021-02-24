<?php


class telefono
{
    private $id;
    private $telefono;
    private $id_usuario;
    private $conexion;
    private $telefonoDAO;
    public function telefono($id, $telefono, $id_usuario)
    {
        $this->id = $id;
        $this->telefono = $telefono;
        $this->id_usuario = $id_usuario;
        $this->conexion= new Conexion();
        $this->telefonoDAO= new telefonoDAO($id, $telefono, $id_usuario);
    }
    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->telefonoDAO->crear());
        $this->conexion->cerrar();
    }
    public function crear_t(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->telefonoDAO->crear_t_t());
        $this->conexion->cerrar();
    }
    public  function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->telefonoDAO->consultar());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new telefono($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    public  function consultar_t_t(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->telefonoDAO->consultar_t());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new telefono($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @return telefonoDAO
     */
    public function getTelefonoDAO()
    {
        return $this->telefonoDAO;
    }

    /**
     * @param telefonoDAO $telefonoDAO
     */
    public function setTelefonoDAO($telefonoDAO)
    {
        $this->telefonoDAO = $telefonoDAO;
    }

}