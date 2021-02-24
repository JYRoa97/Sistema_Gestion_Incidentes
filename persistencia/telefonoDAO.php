<?php


class telefonoDAO
{
    private $id;
    private $telefono;
    private $id_usuario;

    /**
     * telefonoDAO constructor.
     * @param $id
     * @param $telefono
     * @param $id_usuario
     */
    public function telefonoDAO($id, $telefono, $id_usuario)
    {
        $this->id = $id;
        $this->telefono = $telefono;
        $this->id_usuario = $id_usuario;
    }
    public function crear(){
        return "INSERT INTO `telefono`(`telefono`, `usuario_idusuario`) VALUES ('".$this->telefono."',".$this->id_usuario.")";
    }
    public function crear_t_t(){
        return "INSERT INTO `telefono_tecnico`(`telefono`, `tecnico_idusuario`) VALUES ('".$this->telefono."',".$this->id_usuario.")";
    }
    public  function  consultar(){
        return "SELECT * FROM telefono where usuario_idusuario=".$this->id_usuario;
    }
    public  function  consultar_t(){
        return "SELECT * FROM telefono_tecnico where tecnico_idusuario=".$this->id_usuario;
    }


}