<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginController extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model');
    }
    
    
    
    
	public function index()
	{
		 $data = array('title' => 'Iniciar Sesion');
		
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
        
		$this->load->view('partes/head',$data);
		$this->load->view('partes/navbar', $data);
         $this->load->view('login/login_view');
		$this->load->view('partes/footer');
    
    
    }
    
    
    
    
   public function iniciar_sesion()
       
	{   //Reglas de validación
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('contrasena', 'Contraseña','trim|required|callback__valid_login');
		
		//Mensajes en caso de error
		$this->form_validation->set_message('required', 'el campo %s es requerido');
		$this->form_validation->set_message('_valid_login', 'El usuario o contraseña son incorrectos');
		$this->form_validation->set_message('is_unique', 'El campo %s ya existe');
		
		//Forma en que muestra los mensajes de error
		$this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');
		
		if ($this->form_validation->run() == FALSE)
		{	//En caso de que falle la validacion vuelve a cargar la pagina de Login
			$data = array('title' => 'Error de datos');
			$this->load->view('partes/head',$data);
			$this->load->view('partes/navbar');
			$this->load->view('login/login_view');
			$this->load->view('partes/footer');
		}
		else
		{	//Pagina que carga despues de loguearse
			//redirect(current_url()); ---> Vuelve a la pagina que estaba antes de loguearse
			redirect('home');
		}
	}
    
    
    
 function _valid_login($contrasena)
	{ 
		//Se validaron los campos exitosamente. Se valida con la base de datos
		$email = $this->input->post('email');

        //Consulta a la base
		$result = $this->Login_Model->validar_usuario($email, $contrasena);

		if($result)
		{	//Si el resultado es correcto lo asigna a la variable session
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array('idUsuario' => $row->idUsuario,
									'dni' => $row->dni,
									'nombre' => $row->nombre,
									'apellido' => $row->apellido,
									'email' => $row->email,
									'idRol' => $row->idRol);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else 	//Sino devuelve que los datos no coinciden
		{	
			$this->form_validation->set_message('check_database', '<div class="alert alert-danger">Usuario o Contraseña invalido</div>');
			return false;
		}
	}	
    
    
    
    
    
   
		
		/*
	    * Función para cerrar la sesión activa.
	    * Muestra la vista de login al cerrar sesión
	    */
		function logout()
		{
			$this->session->unset_userdata('logged_in');
        	session_destroy();
			//Pagina que carga despues del logout
			redirect('login');
		}
    
    
    
    
         
     }
    
    
    
    
    
    
    
