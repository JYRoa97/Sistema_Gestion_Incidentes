<?php


class incidente
{
    private $id;
    private $descripcion;
    private $estado;
    private $fecha;
    private $direccion;
    private $detalle_direccion;
    private $id_usuario;
    private $incidenteDAO;
    private $conexion;

    /**
     * incidente constructor.
     * @param $id
     * @param $descripcion
     * @param $estado
     * @param $fecha
     * @param $direccion
     * @param $detalle_direccion
     * @param $id_usuario
     */
    public function incidente($id="", $descripcion="", $estado="", $fecha="", $direccion="", $detalle_direccion="", $id_usuario="")
    {
        $this->conexion= new Conexion();
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->direccion = $direccion;
        $this->detalle_direccion = $detalle_direccion;
        $this->id_usuario = $id_usuario;
        $this->incidenteDAO = new incidenteDAO($id, $descripcion, $estado, $fecha, $direccion, $detalle_direccion, $id_usuario);
    }
    public  function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->incidenteDAO->crear());
        $this->conexion->cerrar();
    }
    public  function cambiar_estado(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->incidenteDAO->cambiar_estado());
        $this->conexion->cerrar();
    }
    public  function consultar_por_usuario(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->incidenteDAO->consultar_por_usuario());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new incidente( $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5],$registro[6]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    public  function consultar_todas(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->incidenteDAO->consultar_todas());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new incidente( $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5],$registro[6]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->incidenteDAO->consultar());
        $registro = $this->conexion->extraer();
        $incidente = new incidente( $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5],$registro[6]);
        $this->conexion->cerrar();
        return $incidente;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed|string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed|string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed|string $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed|string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed|string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed|string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed|string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed|string
     */
    public function getDetalleDireccion()
    {
        return $this->detalle_direccion;
    }

    /**
     * @param mixed|string $detalle_direccion
     */
    public function setDetalleDireccion($detalle_direccion)
    {
        $this->detalle_direccion = $detalle_direccion;
    }

    /**
     * @return mixed|string
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed|string $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return incidenteDAO
     */
    public function getIncidenteDAO()
    {
        return $this->incidenteDAO;
    }

    /**
     * @param incidenteDAO $incidenteDAO
     */
    public function setIncidenteDAO($incidenteDAO)
    {
        $this->incidenteDAO = $incidenteDAO;
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



}