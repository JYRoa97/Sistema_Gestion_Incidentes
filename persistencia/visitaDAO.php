<?php


class visitaDAO
{
    private $id;
    private $estado;
    private $fecha;
    private $id_incidente;
    private $id_administrador;
    private $id_tecnico;

    /**
     * visitaDAO constructor.
     * @param $id
     * @param $estado
     * @param $fecha
     * @param $id_incidente
     * @param $id_administrador
     * @param $id_tecnico
     */
    public function visitaDAO($id, $estado, $fecha, $id_incidente, $id_administrador, $id_tecnico)
    {
        $this->id = $id;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->id_incidente = $id_incidente;
        $this->id_administrador = $id_administrador;
        $this->id_tecnico = $id_tecnico;
    }
    public function crear(){
        return "INSERT INTO `visita`(`estado`, `fecha`, `incidente_idincidente`, `administrador_idusuario`, `tecnico_idusuario`)
                VALUES (".$this->estado.",'".$this->fecha."',".$this->id_incidente.",".$this->id_administrador.",".$this->id_tecnico.")";
    }
    public function consultar(){
        return "select * from visita where incidente_idincidente=".$this->id_incidente;

    }
    public function consultar_v_t(){
        return "select * from visita where tecnico_idusuario=".$this->id_tecnico;
    }


}