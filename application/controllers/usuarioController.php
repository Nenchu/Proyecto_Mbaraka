<?php 

	class UsuarioController extends CI_Controller{
		
		public function __construct() 
		{
			parent::__construct();
			$this ->load->model('usuario_Model');
		}
		

		private function _veri_log()
    	{
	    	if ($this->session->userdata('logged_in')) 
	    	{
	    		return TRUE;
	    	} else {
	    		return FALSE;
	    	}
    	}

		/**
	    * Muestra todos los usuarios
	    */
		function index()
		{
			if($this->_veri_log()){
			$data = array('title' => 'Usuarios');
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];


			$dat = array('usuarios' => $this->usuario_Model->get_usuarios());

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/usuarios/muestrausuarios_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh');}
		}
		
		/**
	    * Muestra formulario para agregar usuario
	    */
		function form_agrega_usuario()  	//Si se modifica, modificar (agrega_usuario) tambien
		{
			if($this->_veri_log()){
			$data = array('title' => 'Agregar Usuario');
		
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/usuarios/agregausuario_view');
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh');}
		}

		/**
	    * Verifica datos ingresados en el formulario para agregar usuario
	    */
		function agrega_usuario()
		{
			//Genero las reglas de validacion
            $this->form_validation->set_rules('dni', 'dni', 'required');
			$this->form_validation->set_rules('nombre', 'nombre', 'required');
			$this->form_validation->set_rules('apellido', 'apellido', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.email]');
			$this->form_validation->set_rules('password', 'Contraseña','required');
			$this->form_validation->set_rules('idRol', 'rol','required');

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('matches',
										'<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');

			$this->form_validation->set_message('is_unique',
										'<div class="alert alert-danger">El campo %s ya existe</div>');

			

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$data = array (
                    ''=>$this->input->post('dni',true),
                    'nombre'=>$this->input->post('nombre',true),
                    'apellido'=>$this->input->post('apellido',true),
                    'email'=>$this->input->post('email',true),
                    'Contrasena'=>$this->input->post('password',true),
                    'idRol'=>$this->input->post('idRol',true)
                    );

			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('title' => 'Error de formulario');
			
				$session_data = $this->session->userdata('logged_in');
				$data['idRol'] = $session_data['idRol'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('partes/head', $data);
				$this->load->view('partes/navbar', $data);
				$this->load->view('back/usuarios/agregausuario_view');
				$this->load->view('partes/footer');		
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo add_user para registro de datos
				$usuario = $this->usuario_Model->add_user($data);

				//Redirecciono a la pagina de perfil
				redirect('usuarios_todos');
			}	
		}

		/**
	    * Muestra para modificar un usuario
	    */
		function muestra_modificar()
		{
			$idUsuario = $this->uri->segment(2);
			$datos_usuario = $this->usuario_Model->edit_usuario($idUsuario);

			if ($datos_usuario != FALSE) {
				foreach ($datos_usuario->result() as $row) 
				{
					$nombre = $row->nombre;
					$apellido = $row->apellido;
					$email = $row->email;
					$idRol = $row->idRol;
					$email = $row->email;
        			$contrasena = $row->contrasena;
				}

				$dat = array('usuario' =>$datos_usuario,
					'idUsuario'=>$idUsuario,
					'nombre'=>$nombre,
					'apellido'=>$apellido,
					'email'=>$email,
					'idRol'=>$idRol,
					'contrasena'=>$contrasena
				);
			} 
			else 
			{
				return FALSE;
			}

			if($this->_veri_log()){
			$data = array('title' => 'Modificar Usuario');
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar',$data);
			$this->load->view('back/usuarios/modificausuario_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh');}
		}

		/**
	    * Muestra para modificar un usuario
	    */
		function modificar_usuario()
		{
			//Genero las reglas de validacion
			$this->form_validation->set_rules('nombre', 'nombre', 'required');
			$this->form_validation->set_rules('apellido', 'apellido', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
//			$this->form_validation->set_rules('password', 'Contraseña','required|xss_clean');
			
			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('matches',
										'<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');

			$this->form_validation->set_message('is_unique',
										'<div class="alert alert-danger">El campo %s ya existe</div>');

			

			$idUsuario = $this->uri->segment(2);
			$datos_usuario = $this->usuario_Model->edit_usuario($idUsuario);

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$dat = array(
				'idUsuario'=>$idUsuario,
				'nombre'=>$this->input->post('nombre',true),
				'apellido'=>$this->input->post('apellido',true),
				'email'=>$this->input->post('email',true),
				'idRol'=>$this->input->post('idRol',true),
				
//				'password'=>($contrasena)
			);

			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de formulario');
			
				$session_data = $this->session->userdata('logged_in');
				$data['idRol'] = $session_data['idRol'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('partes/head', $data);
				$this->load->view('partes/navbar', $data);
				$this->load->view('back/usuarios/modificausuario_view', $dat);
				$this->load->view('partes/footer');		
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo update_usuario para registro de datos
				$usuario = $this->usuario_Model->update_usuario($idUsuario, $dat);

				//Redirecciono a la pagina de usuarios
				redirect('usuarios_todos');
			}
		}

		/**
	    * Muestra para modificar un usuario
	    */
		/*function eliminar_usuario()
		{
			$idUsuario = $this->uri->segment(2);
			$datos_usuario = $this->usuario_Model->delete_usuario($idUsuario);

			//Redirecciono a la pagina de usuarios
				redirect('usuarios_todos');
		}*/
        
        
        
        
         /**
		* Obtiene los datos del usuario a eliminar
		*/
	    function eliminar_usuario(){
	    	$idUsuario = $this->uri->segment(2); 
	    	$data = array(
	    		'estado'=>'0'
	    	);

	    	$this->usuario_Model->estado_usuario($idUsuario, $data);
	    	redirect('usuarios_todos', 'refresh');
	    }

	    /**
		* Obtiene los datos del usuario a activar
		*/
	    function activar_usuario(){
	    	$idUsuario = $this->uri->segment(2);
	    	$data = array(
	    		'estado'=>'1'
	    	);

	    	$this->usuario_Model->estado_usuario($idUsuario, $data);
	    	redirect('usuarios_todos', 'refresh');
	    }

	    /**
		* Usuarios eliminados logicamente
		*/

    function muestra_eliminados()
	    {    	
	    	if($this->_veri_log()){
	    	$data = array('title' => 'Usuarios eliminados');
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];
			
			$dat = array(
		        'usuarios' => $this->usuario_Model->usuarios_no_activos()
			);

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/usuarios/usuarioseliminados_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('usuarios_todos', 'refresh');}
		}
	    

		
	}
/* End of file 
*/