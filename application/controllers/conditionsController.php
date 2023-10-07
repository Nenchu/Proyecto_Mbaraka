<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConditionsController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{

		$data = array(
			'content' => 'front/condition_view', // Ubicación del contenido a cargar
			'title' => 'Términos y Usos' // Título de la página
		);
		
		$this->load->view('partes/head', $data);
		$this->load->view('partes/navbar');
		$this->load->view($data['content']);
		$this->load->view('partes/footer');
	}
}
