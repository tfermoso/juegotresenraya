<?php
    Class Usuario{
        private $db;
        private $usuarios;
        
        public function __construct()
        {
            $this->db=Conectar::conexion();
            $this->usuarios=array();
        }

        public function get_usuario($usuario,$password){
            $consulta = "SELECT * FROM usuario WHERE usuario=? AND password=?";
            $stm=$this->db->prepare($consulta);
            $stm->bind_param("ss", $usuario,$password);
            $stm->execute();

            $result=$stm->get_result();

            if($result->num_rows>0){
                return $result->fetch_assoc();
            } else {
                return NULL;
            }
        }

        public function keepAlive(){
            $consulta = "UPDATE usuario SET estado = now() WHERE (idusuario=?);";
            $stm = $this->db->prepare($consulta);
            $stm->bind_param("i", $_SESSION["user"]["idusuario"]);
            $stm->execute();
            $result=$stm->affected_rows;
            
            return $result;
        }

        public function getUsuariosOnline(){
            $usuarios_online=array();
            $consulta="SELECT * FROM usuario WHERE TIMESTAMPDIFF(MINUTE,estado,now())<10 AND idusuario<>".$_SESSION["user"]["idusuario"];
            $stm=$this->db->prepare($consulta);
            $stm->execute();
            $result=$stm->get_result();

            while($user = $result->fetch_assoc()){
                array_push($usuarios_online, array($user["idusuario"], $user["nombre"]));
            }
            return $usuarios_online;
        }

        public function crearPartida($idusuariolocal,$idinvitado)
        {
            $consulta="INSERT INTO partida (jugador1, jugador2) VALUE (?,?);";
            $stm = $this->db->prepare($consulta);
            $stm->bind_param("ii",$idusuariolocal,$idinvitado);
            $stm->execute();
            $result = $stm->num_rows();
            if($result>0){
                return true;
            } else {
                return false;
            }
        }

        public function partidasEnviadas($idusuariolocal)
        {
            $partidas_enviadas=array();
            $consulta="SELECT T1.nombre, T0.idpartida FROM partida T0 INNER JOIN usuario T1 on T0.jugador2 = T1.idusuario WHERE T0.jugador1 = ? AND T0.jugador2 IS NOT NULL AND T0.estado = 0";
            $stm=$this->db->prepare($consulta);
            $stm->bind_param("i",$idusuariolocal);
            $stm->execute();
            $result=$stm->get_result();

            while($partida = $result->fetch_assoc()){
                array_push($partidas_enviadas, array($partida["idpartida"], $partida["nombre"]));
            }
            return $partidas_enviadas;
        }

        public function invitacionesrecibidas($idusuariolocal)
        {
            $invitaciones_recibidas=array();
            $consulta="SELECT T1.nombre, T0.idpartida FROM partida T0 INNER JOIN usuario T1 on T0.jugador1 = T1.idusuario WHERE T0.jugador2 = ? AND T0.estado = 0";
            $stm=$this->db->prepare($consulta);
            $stm->bind_param("i",$idusuariolocal);
            $stm->execute();

            $result=$stm->get_result();

            while($partida = $result->fetch_assoc()){
                array_push($invitaciones_recibidas, array($partida["idpartida"], $partida["nombre"]));
            }
            return $invitaciones_recibidas;
        }

        public function partidasAbiertas($idusuariolocal)
        {
            $partidas_abiertas=array();
            $consulta="SELECT T1.nombre, T0.idpartida FROM partida T0 INNER JOIN usuario T1 on T0.jugador1 = T1.idusuario WHERE T0.jugador1 <> ? AND T0.jugador2 IS NULL";
            $stm=$this->db->prepare($consulta);
            $stm->bind_param("i",$idusuariolocal);
            $stm->execute();
            $result=$stm->get_result();

            while($partida = $result->fetch_assoc()){
                array_push($partidas_abiertas, array($partida["idpartida"], $partida["nombre"]));
            }
            return $partidas_abiertas;
        }

        public function aceptarPartida($idpartida)
        {
            $consultaParticipantes = "SELECT jugador1, jugador2 FROM partida WHERE idpartida=?;";
            $stm=$this->db->prepare($consultaParticipantes);
            $stm->bind_param("i", $idpartida);
            $stm->execute();
            $result=$stm->get_result();

            if($jugadores=$result->fetch_array()){
                $jugadorTurno=$jugadores[rand(0,1)];
                $consultaAceptarPartida="UPDATE partida SET jugador_activo = ?, estado =1 WHERE idpartida=?;";
                $stm=$this->db->prepare($consultaAceptarPartida);
                $stm->bind_param("ii", $jugadorTurno,$idpartida);
                $stm->execute();
                return $stm->affected_rows;
            }
        }

        public function unirmePartida($idpartida,$idusuariolocal)
        {
            try {
                $consultaParticipantes = "SELECT jugador1, jugador2 FROM partida WHERE idpartida=?;";
                $stm=$this->db->prepare($consultaParticipantes);
                $stm->bind_param("i", $idpartida);
                $stm->execute();
                $result=$stm->get_result();
    
                if($jugadores=$result->fetch_array()){
                    $jugadorTurno=$jugadores[rand(0,1)];
                    $consultaAceptarPartida="UPDATE partida SET jugador2=?, jugador_activo = ?, estado =1 WHERE idpartida=?;";
                    $stm=$this->db->prepare($consultaAceptarPartida);
                    $stm->bind_param("iii",$idusuariolocal, $jugadorTurno,$idpartida);
                    $stm->execute();
                    return $stm->affected_rows;
                }            
            } catch (\Throwable $th) {
                var_dump($th);
                die();
            }
            
        }
    }
?>