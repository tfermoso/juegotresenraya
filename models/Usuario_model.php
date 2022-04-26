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
    }
?>