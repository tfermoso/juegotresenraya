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
        $consulta="UPDATE `tresenraya`.`usuario` SET `estado` = now() WHERE (`idusuario` = ?);";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("i",$_SESSION["user"]["idusuario"]);
        $stm->execute();   

        return $stm->affected_rows;
    }
    
    public function getUsuariosOnline()
    {
       $usuarios_online=array();
       $consulta="SELECT * FROM usuario where TIMESTAMPDIFF(MINUTE,estado,now())<10 and idusuario<>".$_SESSION['user']['idusuario'];

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

       return $result > 0 ? true : false;
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

    public function invitacionesrecibidas($idusuariolocal)
    {
        $invitaciones_recibidas=array();
        $consulta="SELECT T1.nombre,T0.idpartida 
        FROM partida T0 
        inner join usuario T1 on T1.idusuario=T0.jugador1 
        where T0.jugador2=? and T0.estado=0";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("i",$idusuariolocal);
        $stm->execute();
        $result=$stm->get_result();

        while($partida=$result->fetch_assoc()){ 
            array_push($invitaciones_recibidas,array($partida["idpartida"],$partida["nombre"]));  
        }
        return $invitaciones_recibidas;
    }

    public function partidasAbiertas($idusuariolocal)
    {
        $partidas_abiertas=array();
        $consulta="SELECT T1.nombre,T0.idpartida 
        FROM partida T0 
        inner join usuario T1 on T1.idusuario=T0.jugador1 
        where T0.jugador1<>? and  T0.jugador2 is null;";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("i",$idusuariolocal);
        $stm->execute();
        $result=$stm->get_result();

        while($partida=$result->fetch_assoc()){ 
            array_push($partidas_abiertas,array($partida["idpartida"],$partida["nombre"]));  
        }
        return $partidas_abiertas;
    }

    public function aceptarPartida($idpartida)
    {
        $consultaParticipantes="select jugador1,jugador2 from partida where idpartida=?";
        $stm=$this->db->prepare($consultaParticipantes);
        $stm->bind_param("i",$idpartida);
        $stm->execute();
        $result=$stm->get_result();

        if ($jugadores = $result->fetch_array()) {
            $jugadorTurno=$jugadores[rand(0,1)];
            $consultaAceptarPartida="UPDATE partida SET jugador_activo = ?, estado = '1' WHERE (idpartida = ?)";
            $stm=$this->db->prepare($consultaAceptarPartida);
            $stm->bind_param("ii",$jugadorTurno,$idpartida);
            $stm->execute();

            return $stm->affected_rows;
        }
    }

    public function unirme($idpartida,$idjugador)
    {
        $consultaUnirme="UPDATE partida SET jugador2 = ?  WHERE (idpartida = ?)";
        $stm=$this->db->prepare($consultaUnirme);
        $stm->bind_param("ii",$idjugador,$idpartida);
        $stm->execute();

        return $stm->affected_rows;
    }

    public function misPartidas($idusuariolocal)
    {
        $partidas=array();
        $consulta="SELECT idpartida,T1.nombre as 'rival',jugador_activo FROM tresenraya.partida T0
        inner join usuario T1 on T1.idusuario=T0.jugador2
        where T0.jugador1=? and T0.estado=1 
        union
        SELECT idpartida,T1.nombre as 'rival',jugador_activo FROM tresenraya.partida T0
        inner join usuario T1 on T1.idusuario=T0.jugador1
        where T0.jugador2=? and T0.estado=1";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("ii",$idusuariolocal,$idusuariolocal);
        $stm->execute();
        $result=$stm->get_result();

        while($partida=$result->fetch_assoc()){ 
            array_push($partidas,array($partida["idpartida"],$partida["rival"],$partida["jugador_activo"]));  
        }
        return $partidas;
    }

    public function registarUsuario($nombre, $usuario, $password)
    {
        $consulta="insert into usuario (nombre, usuario, password) value (?,?,?)";
        $stm=$this->db->prepare($consulta);
        $stm->bind_param("sss",$nombre, $usuario, $password);
        $stm->execute();
        $result=$stm->affected_rows;

        return $result > 0 ? true : false;
    }
  
}

?>