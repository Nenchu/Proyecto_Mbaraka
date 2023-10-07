<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CatalogoController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}
    
    public function index()
	{
		 $data = array('title' => 'Catalogo');
		
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
        
		$this->load->view('partes/head',$data);
		$this->load->view('partes/navbar', $data);
         $this->load->view('front/catalogo_view');
		$this->load->view('partes/footer');
        
        
    
	}

}