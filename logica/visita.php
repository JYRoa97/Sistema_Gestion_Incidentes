<?php


class visita
{
    private $id;
    private $estado;
    private $fecha;
    private $id_incidente;
    private $id_administrador;
    private $id_tecnico;
    private $visitaDAO;
    private $conexion;


    public function visita($id, $estado, $fecha, $id_incidente, $id_administrador, $id_tecnico)
    {
        $this->id = $id;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->id_incidente = $id_incidente;
        $this->id_administrador = $id_administrador;
        $this->id_tecnico = $id_tecnico;
        $this->visitaDAO = new visitaDAO($id, $estado, $fecha, $id_incidente, $id_administrador, $id_tecnico);
        $this->conexion= new Conexion();
    }
    public function crear(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->visitaDAO->crear());
        $this->conexion->cerrar();
    }
    public function consultar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->visitaDAO->consultar());
        $registro = $this->conexion->extraer();
        $visita = new visita( $registro[0], $registro[1], $registro[2], $registro[3], $registro[4],$registro[5]);
        $this->conexion->cerrar();
        return $visita;
    }
    public function consultar_v_t(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->visitaDAO->consultar_v_t());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new visita($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;;
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
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdIncidente()
    {
        return $this->id_incidente;
    }

    /**
     * @param mixed $id_incidente
     */
    public function setIdIncidente($id_incidente)
    {
        $this->id_incidente = $id_incidente;
    }

    /**
     * @return mixed
     */
    public function getIdAdministrador()
    {
        return $this->id_administrador;
    }

    /**
     * @param mixed $id_administrador
     */
    public function setIdAdministrador($id_administrador)
    {
        $this->id_administrador = $id_administrador;
    }

    /**
     * @return mixed
     */
    public function getIdTecnico()
    {
        return $this->id_tecnico;
    }

    /**
     * @param mixed $id_tecnico
     */
    public function setIdTecnico($id_tecnico)
    {
        $this->id_tecnico = $id_tecnico;
    }

    /**
     * @return visitaDAO
     */
    public function getVisitaDAO()
    {
        return $this->visitaDAO;
    }

    /**
     * @param visitaDAO $visitaDAO
     */
    public function setVisitaDAO($visitaDAO)
    {
        $this->visitaDAO = $visitaDAO;
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