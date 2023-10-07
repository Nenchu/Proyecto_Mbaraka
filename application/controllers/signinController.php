<?php
defined('BASEPATH') or exit('No direct script access allowed');

class signinController extends CI_Controller
{
    
     
    public function __construct()
    {  
        parent::__construct();
        $this->load->model('usuario_Model');
    }
    
    
	public function index()
	{
		
         $data = array('title' => 'Registrarse');
		
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
        
		$this->load->view('partes/head',$data);
		$this->load->view('partes/navbar', $data);
         $this->load->view('login/signin_view');
		$this->load->view('partes/footer');
        
        
        
        
        
      /*  $data = array(
			'content' => 'login/signin_view', // Ubicación del contenido a cargar
			'title' => 'Registrarse' // Título de la página
		);

		$this->load->view('partes/head', $data);
        $this->load->view('partes/navbar');
        //$this->load->view('partes/header');		
		$this->load->view($data['content']);
		$this->load->view('partes/footer');*/
	}
    
    
     public function registrar_usuario()
	{
		
		$this->form_validation->set_rules('nombre','nombre','required');
        $this->form_validation->set_rules('apellido','apellido','required');
        $this->form_validation->set_rules('documento','','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('clave','Contraseña','required');
         
         
        
    $this->form_validation->set_message('required','
      <div class="alert alert-danger">
      El campo %s es obligatorio</div>');
        
        //creamos un array para tomar los datos del form, el primer dato corresponde con el nombre de mi tabla
       $data = array (
                    'dni'=>$this->input->post('documento',true),
                    'nombre'=>$this->input->post('nombre',true),
                    'apellido'=>$this->input->post('apellido',true),
                    'email'=>$this->input->post('email',true),
                    'contrasena'=>$this->input->post('clave',true)
                    );
        
        //validamos el formulario
        
        if ($this->form_validation->run() == FALSE){
    
    $data = array(
			'content' => 'login/signin_view', // Ubicación del contenido a cargar
			'title' => 'Error de Registro' // Título de la página
			
		      );
            
        $this->load->view('partes/head', $data);
		$this->load->view('partes/navbar');
		//$this->load->view('partes/header');
		$this->load->view($data['content']);
		$this->load->view('partes/footer');
}else{
    
    $this->usuario_Model->insert_usuario($data);
    
    $data2 = array(
			'content' => 'login/login_view', // Ubicación del contenido a cargar
            'title' => 'Iniciar Sesion' 
			);
    
        $this->load->view('partes/head', $data2);
		$this->load->view('partes/navbar');
		//$this->load->view('partes/header');
		$this->load->view($data2['content']);
		$this->load->view('partes/footer');
   
}
        
	}
    
    
    
    
}
