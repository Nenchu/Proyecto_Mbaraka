<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactController extends CI_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Contact_Model');
    }
    
    
	public function index()
	{
		$data = array(
			'content' => 'front/contact_view', // Ubicación del contenido a cargar
			'title' => 'Información de Contacto', // Título de la página
			'map' => 'true'
		);
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
        
		$this->load->view('partes/head', $data);
		$this->load->view('partes/navbar',$data);
		$this->load->view($data['content']);
		$this->load->view('partes/footer');
	}
    
    
    
    
    public function guardar_consulta()
	{
		
        
        
		$this->form_validation->set_rules('name','nombre','required');
        $this->form_validation->set_rules('phone','Numero de Telefono','required');
        $this->form_validation->set_rules('email','correo electronico','required');
        $this->form_validation->set_rules('message','Mensaje','required');
        
    $this->form_validation->set_message('required','
      <div class="alert alert-danger">
      El campo %s es obligatorio</div>');
        
        //creamos un array para tomar los datos del form, el primer dato corresponde con el nombre de mi tabla
       $data = array (
                    'nombre'=>$this->input->post('name',true),
                    'telefono'=>$this->input->post('phone',true),
                    'email'=>$this->input->post('email',true),
                    'mensaje'=>$this->input->post('message',true)
                    );
        
        //validamos el formulario
        
        if ($this->form_validation->run() == false){
    
    $data = array(
			'content' => 'front/contact_view', // Ubicación del contenido a cargar
			'title' => 'Error de Contacto', // Título de la página
			
		);
        
        $session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
        
        $this->load->view('partes/head', $data);
		$this->load->view('partes/navbar',$data);
		$this->load->view($data['content']);
		$this->load->view('partes/footer');
     }else{
    
    $this->Contact_Model->insert_contact($data);
    
    $data2 = array(
			'content' => 'front/contactExito_view', // Ubicación del contenido a cargar
			'title' => 'Exito Contacto', // Título de la página
            'mensaje'=>'Su consulta se ha enviado con exito');
        $session_data = $this->session->userdata('logged_in');
		$data2['idRol'] = $session_data['idRol'];
		$data2['nombre'] = $session_data['nombre'];
        
    
        $this->load->view('partes/head', $data2);
		$this->load->view('partes/navbar',$data2);
		$this->load->view($data2['content']);
		$this->load->view('partes/footer');
   
}
        
	}
    

    
public function muestraconsultas()
		{

			$data = array('title' => 'Consultas Clientes');
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('consulta' => $this->Contact_Model->get_consultas());

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/usuarios/muestraconsultas_view', $dat);
			$this->load->view('partes/footer');
			
		}
    
    
public function eliminarconsultas()
       {
         $idconsulta = $this->uri->segment(2);
			$this->Contact_Model->delete_consulta($idconsulta);

			//Redirecciono a la pagina de usuarios
				redirect('consultas');
    
    
          }
    
   
}


    
    
    

