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

  
}

?>