<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$params = array (
			'js_files' => array( 
				'assets/js/vue.js',
				'assets/node_modules/axios/dist/axios.min.js',
				'assets/js/controllers/ListUsuariosController.js'
		),
	);

	$data = array (
		'params' => $params,
		'pagina' => $this->load->view("paginas/view_lista_usuario", array(), TRUE)
	);

			$this->load->view('templates/view_geral', $data);
  }
	
}
