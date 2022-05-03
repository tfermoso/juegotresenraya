<?php

class Usuario{
    private $db;
    private $usuarios;

    public function __construct()
    {
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function get_usuario($usuario,$password)
    {
        $consulta="Select * from usuario where usuario=? and password=?";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("ss",$usuario,$password);
        $stm->execute();
        $result=$stm->get_result();
        if($result->num_rows>0){
            return $result->fetch_assoc();
        }else{
            return NULL;
        }
        
    }

    public function keepAlive()
    {
        $consulta="UPDATE `tresenraya`.`usuario` SET `estado` = now() WHERE (`idusuario` = ?);
        ";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("i",$_SESSION["user"]["idusuario"]);
        $stm->execute();   
        return $stm->affected_rows;
    }
    public function getUsuariosOnline()
    {
       $usuarios_online=array();
       $consulta="SELECT *  FROM tresenraya.usuario where TIMESTAMPDIFF(MINUTE,estado,now())<10 and idusuario<>".$_SESSION['user']['idusuario'];
       $stm=$this->db->prepare($consulta);
       $stm->execute();
       $result=$stm->get_result();
       while($user=$result->fetch_assoc()){ 
           array_push($usuarios_online,array($user["idusuario"],$user["nombre"]));  
       }
       return $usuarios_online;
    }

    public function crearPartida($idusuariolocal,$idinvitado)
    {
       $consulta="insert into partida (jugador1,jugador2) value (?,?)";
       $stm=$this->db->prepare($consulta);
       $stm->bind_param("ii",$idusuariolocal,$idinvitado);
       $stm->execute();
       $result=$stm->num_rows();
       if($result>0){
           return true;
       }else{
           return false;
       }
    }

    public function partidasEnviadas($idusuariolocal)
    {
        $partidas_enviadas=array();
        $consulta="SELECT T1.nombre,T0.idpartida 
        FROM partida T0 
        inner join usuario T1 on T1.idusuario=T0.jugador2 
        where T0.jugador1=? and T0.estado=0 and T0.jugador2 is not null;";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("i",$idusuariolocal);
        $stm->execute();
        $result=$stm->get_result();
        while($partida=$result->fetch_assoc()){ 
            array_push($partidas_enviadas,array($partida["idpartida"],$partida["nombre"]));  
        }
        return $partidas_enviadas;
    }

  
}

?>