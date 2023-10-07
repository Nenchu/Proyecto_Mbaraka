<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ProductoController extends CI_Controller{
		
		public function __construct() 
		{
			parent::__construct();
			$this ->load->model('producto_Model');
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
	    * Muestra todos los productos en tabla
	    */
		function index()
		{
			if($this->_veri_log()){
			$data = array('title' => 'Productos');
		
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_Model->get_productos() );

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/productos/muestraproductos_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * Muestra solo las bombachas de hombre en tabla
	    */
		function muestra_bombachasH()
		{
			if($this->_veri_log()){
			$data = array('title' => 'Bombachas de Campo Hombre');
		
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_Model->get_bombachasH() );

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/productos/bombachahombre_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh'); }
		}

		/*
	    * Muestra solo las bombachas de Mujer en tabla
	    */
		function muestra_bombachasM()
		{
			if($this->_veri_log()){
			$data = array('title' => 'Bombachas de Campo Mujer');
		
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$dat = array('productos' => $this->producto_Model->get_bombachasM() );

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/productos/bombachamujer_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh'); }
		}
		
		/**
	    * Muestra formulario para agregar producto
	    */
		function form_agrega_producto()  	//Si se modifica, modificar (agrega_producto) tambien
		{
			if($this->_veri_log()){
			$data = array('title' => 'Agregar Producto');
		
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/productos/agregaproducto_view');
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh'); }
		}

		/**
	    * Verifica datos ingresados en el formulario para agregar producto
	    */
		function agrega_producto()
		{
			//Genero las reglas de validacion
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|is_unique[productos.descripcion]');
			$this->form_validation->set_rules('idCategoria', 'Categoria', 'required');
			$this->form_validation->set_rules('precio', 'precio', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('filename', 'imagen', 'required|callback__image_upload');

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required',
										'<div class="alert alert-danger">El campo %s es obligatorio</div>');

			$this->form_validation->set_message('is_unique',
										'<div class="alert alert-danger">El campo %s ya existe</div>');

			$this->form_validation->set_message('numeric',
							'<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');


			if (!$this->form_validation->run())
			{
				$data = array('title' => 'Error de formulario');
		
				$session_data = $this->session->userdata('logged_in');
				$data['idRol'] = $session_data['idRol'];
				$data['nombre'] = $session_data['nombre'];


				$this->load->view('partes/head', $data);
				$this->load->view('partes/navbar', $data);
				$this->load->view('back/productos/agregaproducto_view');
				$this->load->view('partes/footer');
			}
			else
			{
				$this->_image_upload();			
			}
		}
		
		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		function _image_upload()
		{
			$this->load->library('upload');
	 
            //Comprueba si hay un archivo cargado
            if (!empty($_FILES['filename']['name']))
            {
                // Especifica la configuración para el archivo
                $config['upload_path'] = 'assets/images/';
                $config['allowed_types'] = 'gif|jpg|JPEG|png';

                $config['max_size'] = '2048';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';       
 
                // Inicializa la configuración para el archivo 
                $this->upload->initialize($config);
 
                if ($this->upload->do_upload('filename'))
                {
                	// Mueve archivo a la carpeta indicada en la variable $data
                    $data = $this->upload->data();

                    // Path donde guarda el archivo..
                    $url ="assets/images/".$_FILES['filename']['name'];

                    // Array de datos para insertar en productos
                    $data = array(
						'descripcion'=>$this->input->post('descripcion',true),
						'idCategoria'=>$this->input->post('idCategoria',true),
						'imagen'=>$url,
						'precio'=>$this->input->post('precio',true),
						'stock'=>$this->input->post('stock',true),
						
					);

					$productos = $this->producto_Model->add_producto($data);

					redirect('productos_todos', 'refresh');

					return TRUE;
                }
                else
                {
                	//Mensaje de error si no existe imagen correcta
                    $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';//$this->upload->display_errors();
					$this->form_validation->set_message('_image_upload',$imageerrors );
					
					return false;
                }
 
            }
            else
            {
            	//redirect('verifico_nuevoproducto');
		        	
            }
		}

		/**
	    * Muestra para modificar un producto
	    */
		function muestra_modificar()
		{
			$idProducto = $this->uri->segment(2);
			$datos_producto = $this->producto_Model->edit_producto($idProducto);

			if ($datos_producto != FALSE) {
				foreach ($datos_producto->result() as $row) 
				{
					$descripcion = $row->descripcion;
					$idCategoria = $row->idCategoria;
					$imagen = $row->imagen;
					$precio = $row->precio;
					$stock = $row->stock;
					
				}

				$dat = array('producto' =>$datos_producto,
					'idProducto'=>$idProducto,
					'descripcion'=>$descripcion,
					'idCategoria'=>$idCategoria,
					'imagen'=>$imagen,
					'precio'=>$precio,
					'stock'=>$stock,

				);
			} 
			else 
			{
				return FALSE;
			}
			if($this->_veri_log()){
			$data = array('title' => 'Modificar Producto');
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/productos/modificaproducto_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh');}
		}

		/**
	    * Verifica datos para modificar un producto
	    */
		function modificar_producto()
		{
			//Validación del formulario
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
			$this->form_validation->set_rules('idCategoria', 'Categoria', 'required');
			$this->form_validation->set_rules('precio', 'precio', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
		

			//Mensaje del form_validation
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio, al intentar modificar estaba vacio</div>');

			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico, al intentar modificar estaba vacio</div>'); 

			$idProducto = $this->uri->segment(2);
			$datos_producto = $this->producto_Model->edit_producto($idProducto);

			foreach ($datos_producto->result() as $row) 
			{
				$imagen = $row->imagen;
			}

			$dat = array(
				
				'descripcion'=>$this->input->post('descripcion',true),
				'idCategoria'=>$this->input->post('idCategoria',true),
				'imagen'=>$imagen,
				'precio'=>$this->input->post('precio',true),
				
				'stock'=>$this->input->post('stock',true),
			
			);

			if ($this->form_validation->run()==FALSE)
			{
				$data = array('title' => 'Error de formulario');
				$session_data = $this->session->userdata('logged_in');
				$data['idRol'] = $session_data['idRol'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('partes/head', $data);
				$this->load->view('partes/navbar', $data);
				$this->load->view('back/productos/modificaproducto_view', $dat);
				$this->load->view('partes/footer');
			}
			else
			{
				$this->_image_modif();		
			}
			
		}

		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* Si el campo imagen se encuentra vacio asume que la imagen no fue modificado.
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		
	    function _image_modif()
	    {
			//Cargo la libreria para subir archivos
	    	$this->load->library('upload');

			// Obtengo el id del producto
	    	$idProducto = $this->uri->segment(2);

	        // Array de datos para obtener datos  sin la imagen 
	    	$dat = array(
				'idProducto'=>$idProducto,
				'descripcion'=>$this->input->post('descripcion',true),
				'idCategoria'=>$this->input->post('idCategoria',true),
				'precio'=>$this->input->post('precio',true),
				'stock'=>$this->input->post('stock',true),
			
			);

			// Si la imagen esta vacia se asume que no se modifica
	    	if (!empty($_FILES['filename']['name']))
	    	{            
	            // Especifica la configuración para el archivo
	    		$config['upload_path'] = 'assets/images/';
	    		$config['allowed_types'] = 'gif|jpg|jpeg|png';

	    		$config['max_size'] = '2048';
	    		$config['max_width']  = '1024';
	    		$config['max_height']  = '768';       

	            // Inicializa la configuración para el archivo 
	    		$this->upload->initialize($config);

	    		if ($this->upload->do_upload('filename'))
	    		{
	                	// Mueve archivo a la carpeta indicada en la variable $data
	    			$data = $this->upload->data();

	                    // Path donde guarda el archivo..
	    			$url ="assets/images/".$_FILES['filename']['name'];

	                 	// Agrego la imagen si se modifico.  
	    			$dat['imagen']=$url;

						// Actualiza datos del libro
	    			$this->producto_Model->update_producto($idProducto, $dat);
	    			redirect('productos_todos', 'refresh');
	    		}
	    		else
	    		{
	                	//Mensaje de error si no existe imagen correcta
	    			$imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';
	    			$this->form_validation->set_message('_image_modif',$imageerrors );
	    			return false;
	    		} 
	    	}
	    	else
	    	{
	    		$this->producto_Model->update_producto($idProducto, $dat);
	    		redirect('productos_todos', 'refresh');
	    	}
	    }


	    /**
		* Obtiene los datos del producto a eliminar
		*/
	    function eliminar_producto(){
	    	$idProducto = $this->uri->segment(2); 
	    	$data = array(
	    		'estado'=>'0'
	    	);

	    	$this->producto_Model->estado_producto($idProducto, $data);
	    	redirect('productos_todos', 'refresh');
	    }

	    /**
		* Obtiene los datos del producto a activar
		*/
	    function activar_producto(){
	    	$idProducto = $this->uri->segment(2);
	    	$data = array(
	    		'estado'=>'1'
	    	);

	    	$this->producto_Model->estado_producto($idProducto, $data);
	    	redirect('productos_todos', 'refresh');
	    }

	    /**
		* Productos eliminados logicamente
		*/

    function muestra_eliminados()
	    {    	
	    	if($this->_veri_log()){
	    	$data = array('title' => 'Productos eliminados');
			$session_data = $this->session->userdata('logged_in');
			$data['idRol'] = $session_data['idRol'];
			$data['nombre'] = $session_data['nombre'];
			
			$dat = array(
		        'productos' => $this->producto_Model->productos_no_activos()
			);

			$this->load->view('partes/head', $data);
			$this->load->view('partes/navbar', $data);
			$this->load->view('back/productos/muestraeliminados_view', $dat);
			$this->load->view('partes/footer');
			}else{
			redirect('login', 'refresh');}
		}
	    

		
		
		
	}
/* End of file
*/