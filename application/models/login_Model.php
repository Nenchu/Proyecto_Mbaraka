<?php

	
class Login_Model extends CI_Model
{

  public function __construct() {
         parent::__construct();
    } 

  public function validar_usuario ($email, $contrasena){
        
       $query = $this->db->get_where('usuarios', array('email'=>$email,'Contrasena'=>$contrasena, 'estado'=>'1'), 1);

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    
}




}
    