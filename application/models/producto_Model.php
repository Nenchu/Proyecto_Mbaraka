<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class producto_Model extends CI_Model{
		
	/**
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
    }

    /**
    * Retorna todos los productos
    */
    function get_productos()
    {
        $this->db->join('categorias', 'productos.idCategoria = categorias.idCategoria');
        $query = $this->db->get_where('productos', array('estado' => '1'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    /**
    * Retorna todas las bombachas de Hombre
    */
    function get_bombachasH()
    {
        $this->db->join('categorias', 'productos.idCategoria = categorias.idCategoria');
        $query = $this->db->get_where('productos', array('estado' => '1', 'descripcionCateg' => 'Bombachas Hombre'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    /**
    * Retorna todas las bombachas de Mujer
    */
    function get_bombachasM()
    {
        $this->db->join('categorias', 'productos.idCategoria = categorias.idCategoria');
        $query = $this->db->get_where('productos', array('estado' => '1', 'descripcionCateg' => 'Bombachas Mujer'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    /**
    * Inserta un producto
    */
    public function add_producto($data){
        $this->db->insert('productos', $data);
    }

    /**
    * Retorna todos los datos de un producto
    */
    function edit_producto ($idProducto){

        $query = $this->db->get_where('productos', array('idProducto' => $idProducto),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /**
    * Actualiza los datos de un producto
    */
    function update_producto($idProducto, $data){
        $this->db->where('idProducto', $idProducto);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Eliminación y activación logica de un producto
    */
    function estado_producto($idProducto, $data){
        $this->db->where('Idproducto', $idProducto);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Retorna todos los productos inactivos
    */
    function productos_no_activos()
    {
        $this->db->join('categorias', 'productos.idCategoria = categorias.idCategoria');
        $query = $this->db->get_where('productos', array('estado' => '0'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
} 