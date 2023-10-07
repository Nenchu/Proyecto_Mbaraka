<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}
	
	public function index()
	{
		

		$data = array(
			'content' => 'front/about_view', // Ubicación del contenido a cargar
			'title' => 'Quienes Somos', // Título de la página
			
		);
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
        
		$this->load->view('partes/head', $data);
		$this->load->view('partes/navbar',$data);
		//$this->load->view('template/header');
		$this->load->view($data['content']);
		$this->load->view('partes/footer');
	}
}
