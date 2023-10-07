<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    
    public function _construct() 
	{
		parent::_construct();
	}
    
    
	public function index()
	{

	        if ($session_data = $this->session->userdata('logged_in')){
	           
                 $data = array(
			'content' => 'front/home_view', // Ubicación del contenido a cargar
			'title' => 'Home - Registrado' // Título de la página
		
                );
           
	            $data['idRol'] = $session_data['idRol'];
				$data['nombre'] = $session_data['nombre'];

	            $this->load->view('partes/head', $data);
	            $this->load->view('partes/navbar', $data);
                $this->load->view('partes/header');	
	            $this->load->view($data['content']);
	            $this->load->view('partes/footer');
        	}
        	else {
                
                $data = array(
			'content' => 'front/home_view', // Ubicación del contenido a cargar
			'title' => 'Home' // Título de la página
		
        );


		$this->load->view('partes/head', $data);
        $this->load->view('partes/navbar');
		$this->load->view('partes/header');		
		$this->load->view($data['content']);
		$this->load->view('partes/footer');
        	}
	}
    
    
    
}


