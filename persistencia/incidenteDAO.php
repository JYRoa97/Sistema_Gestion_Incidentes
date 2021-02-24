<?php


class incidenteDAO
{
    private $id;
    private $descripcion;
    private $estado;
    private $fecha;
    private $direccion;
    private $detalle_direccion;
    private $id_usuario;

    public  function incidenteDAO($id='',$descripcion='',$estado='',$fecha='',$direccion='',$detalle_direccion='',$id_usuario=''){
        $this->id=$id;
        $this->descripcion=$descripcion;
        $this->estado=$estado;
        $this->fecha=$fecha;
        $this->direccion=$direccion;
        $this->detalle_direccion=$detalle_direccion;
        $this->id_usuario=$id_usuario;
    }
    public function crear(){
        return "INSERT INTO `incidente`(`descripcion`, `estado`, `fecha`, `direccion`, `detalle_direccion`, `usuario_idusuario`) 
                VALUES ('".$this->descripcion."',".$this->estado.",'".$this->fecha."','".$this->direccion."','".$this->detalle_direccion."',".$this->id_usuario.")";
    }
    public function consultar_por_usuario(){
        return "SELECT * FROM `incidente` WHERE usuario_idusuario=".$this->id_usuario;
    }
    public function consultar_todas(){
        return "SELECT * FROM `incidente` ";
    }
    public function cambiar_estado(){
        return "UPDATE `incidente` 
                SET `estado`=".$this->estado." WHERE idincidente=".$this->id;

    }
    public function consultar(){
        return "SELECT 
                `idincidente`, `descripcion`, `estado`, `fecha`, `direccion`, `detalle_direccion`, `usuario_idusuario` 
                FROM `incidente` WHERE idincidente=".$this->id;

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


}