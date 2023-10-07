
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CarritoController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('carrito_Model');
		$this->load->model('producto_Model');
        $this->load->library('cart');
	}

	public function index()
	{
	}

	//Este metodo llama a la pagina Bombachas Hombres, con el carrito si está logueado
	public function BombachasH()
	{
		$dat = array('productos' => $this->producto_Model->get_bombachasH());

		$data = array('title' => 'Bombachas Hombres');
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
		
		$this->load->view('partes/head', $data);
		$this->load->view('partes/navbar', $data);
       if ($session_data) {
		$this->load->view('partes/carrito' );
		}
        
		$this->load->view('front/bombachasH_view', $dat);
		$this->load->view('partes/footer');
	}


	//Este metodo llama a la pagina Bombachas Mujeres, con el carrito si está logueado
	public function bombachasM()
	{
		$dat = array('productos' => $this->producto_Model->get_bombachasM());

		$data = array('title' => 'Bombachas Mujeres');
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
		
		$this->load->view('partes/head', $data);
		$this->load->view('partes/navbar', $data);
		if ($session_data) 
		{
		$this->load->view('partes/carrito' );
		}
		$this->load->view('front/bombachasM_view', $dat);
		$this->load->view('partes/footer');
	}

	
	//Agrega elemento al carrito
	function add()
	{
        // Genera array para insertar en el carrito
		$insert_data = array(
			'id' => $this->input->post('idProducto'),
			'name' => $this->input->post('descripcion'),
			'price' => $this->input->post('precio'),
			'qty' => 1
			);	

        // Inserta elemento al carrito
		$this->cart->insert($insert_data);
	      
        // Redirije a la misma pagina que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	
	//Elimina elemento del carrito o el carrito entero
	function remove($rowid) {
        //Si $rowid es "all" destruye el carrito
		if ($rowid==="all")
		{
			$this->cart->destroy();
		}
		else //Sino destruye sola fila seleccionada
		{ 
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
				);
            // Actualiza los datos
			$this->cart->update($data);
		}
		
        // Redirije a la misma pagina que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	

	//Actualiza el carrito que se muestra
	function actualiza_carrito()
    {        
	    // Recibe los datos del carrito, calcula y actualiza
       	$cart_info =  $_POST['cart'];

		foreach( $cart_info as $id => $cart)
		{	
		    $rowid = $cart['rowid'];
	    	$price = $cart['price'];
	    	$amount = $price * $cart['qty'];
	    	$qty = $cart['qty'];
	    
	    	$data = array(
					'rowid'   => $rowid,
	                'price'   => $price,
	                'amount' =>  $amount,
					'qty'     => $qty
					);
	         
			$this->cart->update($data);
		}

		// Redirije a la misma pagina que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}


	//Muestra los detalles de la venta y confirma(funcion guarda_compra())
	function muestra_compra()
	{
		$data = array('title' => 'Confirmar compra');
		
		$session_data = $this->session->userdata('logged_in');
		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		
		$this->load->view('partes/head', $data);
		$this->load->view('partes/navbar', $data);
		$this->load->view('front/compra_view', $data);
		$this->load->view('partes/footer');
    }
    

    //Guarda los datos de la venta en la base de datos    
    public function guarda_compra()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['idUsuario'] = $session_data['idUsuario'];

		$total = $this->input->post('total_venta');

		
		$venta = array(
			'fecha' 		=> date('Y-m-d'),
			'idUsuario' 	=> $data['idUsuario'],
			'total'	=> $total
		);	
		$venta_id = $this->carrito_Model->insert_venta($venta);
		
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$venta_detalle = array(
					'idEncabezado' 		=> $venta_id,
					'idproducto' 	=> $item['id'],
					'cantidad' 		=> $item['qty'],
					'precio' 		=> $item['price'],
					
					);	
            
            	$cust_id = $this->carrito_Model->insert_venta_detalle($venta_detalle);

            	//Descuenta del stock y lo guarda en la base de datos
            	$producto = $this->producto_Model->edit_producto($item['id']);
            	foreach ($producto->result() as $row) 
				{
					$stock = $row->stock;
				}

            	$stock_edit = $stock - 	$item['qty'];

            	$stock_nuevo = array(
            		'stock'	=> $stock_edit
            		);

            	$modifica = $this->producto_Model->update_producto($item['id'], $stock_nuevo);

			endforeach;
		endif;
	    

		$data = array('title' => 'Compra Finalizada');

		$data['idRol'] = $session_data['idRol'];
		$data['nombre'] = $session_data['nombre'];

        $this->load->view('partes/head', $data);
		$this->load->view('partes/navbar', $data);
		$this->load->view('front/compralista_view');
		$this->load->view('partes/footer');

		$final = $this->cart->destroy();

	}



}