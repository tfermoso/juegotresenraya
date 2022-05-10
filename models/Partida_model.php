<?php

class Partida{
    private $idpartida;
    private $nombre_jugador1;
    private $nombre_jugador2;
    private $idjugador1;
    private $idjugador2;
    private $turno;
    private $jugador_activo;
    private $estado;
    private $celdas;
    private $db;

    public function __construct($id)
    {
        $this->db=Conectar::conexion();
        $this->celdas=array();
        $this->getPartida($id);
    }

    public function getNombreJugador1()
    {
       return $this->nombre_jugador1;
    }
    public function getNombreJugador2()
    {
       return $this->nombre_jugador2;
    }
    public function getIdJugador1()
    {
       return $this->idjugador1;
    }
    public function getIdJugador2()
    {
       return $this->idjugador2;
    }
    public function getIdPartida()
    {
        return $this->idpartida;
    }
    public function getTurno()
    {
        return $this->turno;
    }
    public function getCeldas()
    {
        return $this->celdas;
    }
    public function getJugadorActivo()
    {
        return $this->jugador_activo;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    


    public function getPartida($idpartida)
    {   
  
       $consulta="select T0.idpartida,T0.jugador1 as idjugador1,T0.jugador2 as idjugador2,T1.nombre as jugador1,T2.nombre as jugador2,jugador_activo,
       casilla0,casilla1,casilla2,casilla3,casilla4,casilla5,casilla6,casilla7,casilla8,T0.estado,turno from partida T0 
       inner join usuario T1 on T0.jugador1=T1.idusuario
       inner join usuario T2 on T0.jugador2=T2.idusuario
        where idpartida=?";
       $stm=$this->db->prepare($consulta);
       $stm->bind_param("i",$idpartida);
       $stm->execute();
       $resultado=$stm->get_result();
       if($resultado->num_rows>0){
           $datos=$resultado->fetch_assoc();
           $this->idpartida=$datos["idpartida"];
           $this->nombre_jugador1=$datos["jugador1"];
           $this->nombre_jugador2=$datos["jugador2"];
           $this->idjugador1=$datos["idjugador1"];
           $this->idjugador2=$datos["idjugador2"];
           $this->turno=$datos["turno"];
           $this->jugador_activo=$datos["jugador_activo"];
           $this->estado=$datos["estado"];
           $columna="casilla";
           for ($i=0; $i <9 ; $i++) { 
               $col=$columna.$i;
               if($datos[$col]!=NULL){
                array_push($this->celdas,$datos[$col]);
               }else{
                array_push($this->celdas,-1);
               }
           }
           //array_push($this->celdas,$datos["casilla0"],$datos["casilla1"],$datos["casilla2"],$datos["casilla3"],$datos["casilla4"],$datos["casilla5"],$datos["casilla6"],$datos["casilla7"],$datos["casilla8"]);
       }
    }

    public function mover($casilla,$idusuario,$idpartida)
    {
       $jugador_turno=$idusuario==$this->idjugador1?$this->idjugador2:$this->idjugador1;
       $consulta="UPDATE partida SET ".$casilla." = ".$idusuario.",jugador_activo=".$jugador_turno." WHERE (`idpartida` = ".$idpartida.")";
       $stm=$this->db->prepare($consulta);
       $stm->execute();
       return $result=$stm->affected_rows;

    }

    public function actualizarEstado()
    {
        //Actualizamos el estado de la partida
       $estadoPartida="UPDATE partida SET resultado=".$this->resultadoPartida()." WHERE (`idpartida` = ".$this->idpartida.")";
       $stm=$this->db->prepare($estadoPartida);
       $stm->execute();
    }

    public function resultadoPartida()
    {
        for ($i=0; $i <7 ; $i=$i+3) { 
            if($this->celdas[$i]==$this->celdas[$i+1] & $this->celdas[$i]==$this->celdas[$i+2]){
                return $this->celdas[$i];
            }
        }
        for ($i=0; $i <3 ; $i++) { 
            if($this->celdas[$i]==$this->celdas[$i+3] & $this->celdas[$i]==$this->celdas[$i+6]){
                return $this->celdas[$i];
            }
        }
        if($this->celdas[0]==$this->celdas[4] & $this->celdas[0]==$this->celdas[8]){
            return $this->celdas[0];
        }   
        if($this->celdas[2]==$this->celdas[4] & $this->celdas[2]==$this->celdas[6]){
            return $this->celdas[2];
        }  
        for ($i=0; $i < count($this->celdas); $i++) { 
            if($this->celdas[$i]==-1){
                return -1;
            }
        }
        return 0;

    }
}






?>