<?php

	
class Contact_Model extends CI_Model{
     
    public function __construct() {
         parent::__construct();
    } 
    
    
    public function insert_contact ($data){
        
        $this->db->insert('consulta',$data);
    }
    
    
     function get_consultas()
	{
		
		$query = $this->db->get('consulta');

		if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
	}

    
    function delete_consulta($idconsulta)
	{			
		$this->db->where('idconsulta', $idconsulta);
		$query = $this->db->delete('consulta'); 
		return true;	
	}
    
    
}

?>
