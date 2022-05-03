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
    }
?>