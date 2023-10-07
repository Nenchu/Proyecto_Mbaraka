<?php

	
class Usuario_Model extends CI_Model
{

  public function __construct() {
         parent::__construct();
    } 

 function get_usuarios()
	{
		$this->db->join('rol', 'usuarios.idRol = rol.idRol');
		$query = $this->db->get_where('usuarios', array('estado' => '1'));

		if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
	}
	

	function insert_usuario($data)
	{
		$this->db->insert('usuarios', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	

	function edit_usuario($idUsuario)
	{
		$query = $this->db->get_where('usuarios', array('idUsuario' => $idUsuario),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
	}
	
	function update_usuario($idUsuario, $data)
	{
		$this->db->where('idUsuario', $idUsuario);
        $query = $this->db->update('usuarios', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	 /**
    * Eliminación y activación logica de un usuario
    */
    function estado_usuario($idUsuario, $data){
        $this->db->where('IdUsuario', $idUsuario);
        $query = $this->db->update('usuarios', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Retorna todos los usuarios inactivos
    */
    function usuarios_no_activos()
    {
        $this->db->join('rol', 'usuarios.idRol = rol.idRol');
        $query = $this->db->get_where('usuarios', array('estado' => '0'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
	
    
    
  
    
}
    