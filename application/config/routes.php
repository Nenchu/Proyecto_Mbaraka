<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['home'] = 'homeController';// pagina inicial
$route['about'] = 'aboutController'; // pagina quienes somos
$route['catalogo'] = 'catalogoController'; // pagina catalogo
$route['commerce'] = 'commerceController'; // pagina comercialización
$route['conditions'] = 'conditionsController'; // pagina condiciones de uso
$route['contact'] = 'contactController'; // pagina información de contacto

/*Ruta para vista de consulta de clientes/Administrador */
$route['enviar_consulta']='contactController/guardar_consulta';
$route['consultas'] = 'contactController/muestraconsultas';
$route['consulta_eliminar/(:num)'] = 'contactController/eliminarconsultas/$1';




$route['login'] = 'loginController';
$route['signin'] = 'signinController';
$route['logout']='loginController/logout';

$route['datos_registro']='signinController/registrar_usuario';
$route['datos_sesion']='loginController/iniciar_sesion';


/*
Rutas para vistas de productos/Administrador
*/
$route['productos_todos'] = 'productoController';
$route['productos_bombachasH'] = 'productoController/muestra_bombachasH';
$route['productos_bombachasM'] = 'productoController/muestra_bombachasM';
$route['productos_eliminados'] = 'productoController/muestra_eliminados';
$route['productos_agrega'] = 'productoController/form_agrega_producto';
$route['productos_modifica/(:num)'] = 'productoController/muestra_modificar/$1';
$route['productos_elimina/(:num)'] = 'productoController/eliminar_producto/$1';
$route['productos_activa/(:num)'] = 'productoController/activar_producto/$1';


/*
Rutas para verificar informacion de productos (formularios)
*/
$route['verifico_nuevoproducto'] = 'productoController/agrega_producto';
$route['verifico_modificaproducto/(:num)'] = 'productoController/modificar_producto/$1';



/*
Rutas para vistas de usuarios
*/
$route['usuarios_todos'] = 'usuarioController';
$route['usuarios_agrega'] = 'usuarioController/form_agrega_usuario';
$route['usuarios_modifica/(:num)'] = 'usuarioController/muestra_modificar/$1';
$route['usuarios_elimina/(:num)'] = 'usuarioController/eliminar_usuario/$1';
$route['usuarios_eliminados'] = 'usuarioController/muestra_eliminados';
$route['usuarios_activa/(:num)'] = 'usuarioController/activar_usuario/$1';


/*
Rutas para verificar informacion de usuarios
*/
$route['verifico_agregausuario'] = 'usuarioController/agrega_usuario';
$route['verifico_modificausuario/(:num)'] = 'usuarioController/modificar_usuario/$1';

/*
Rutas para carrito
*/
$route['bombachasH'] = 'carritoController/bombachasH';
$route['bombachasM'] = 'carritoController/bombachasM';
$route['carrito_agrega'] = 'carritoController/add';
$route['carrito_actualiza'] = 'carritoController/actualiza_carrito';
$route['carrito_elimina/(:any)'] = 'carritoController/remove/$1';
$route['comprar'] = 'carritoController/muestra_compra';
$route['confirma_compra'] = 'carritoController/guarda_compra';

