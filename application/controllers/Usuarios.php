<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Usuarios extends CI_Controller
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
			'assets/node_modules/vue-js-modal/dist/index.nocss.js',
			'assets/node_modules/vue-js-modal/dist/styles.css',
			'assets/js/controllers/UsuariosController.js'
		),
	);

	$data = array (
		'params' => $params,
		'pagina' => $this->load->view("paginas/view_lista_usuario", array(), TRUE)
	);

	$this->load->view('templates/view_geral', $data);
  }

 	public function AddUsuario(){
		$params = array (
			'js_files' => array(
				'assets/node_modules/jquery/dist/jquery.js', 
				'assets/js/vue.js',
				'assets/node_modules/axios/dist/axios.min.js',
				'assets/js/controllers/UsuariosController.js'
			),
		);
	
		$data = array (
			'params' => $params,
			'pagina' => $this->load->view("paginas/view_add_usuario", array(), TRUE)
		);

		$this->load->view("templates/view_geral", $data);	
	}

	public function buscarDados() {
		$this->load->model("Usuarios_model");
		$resultLista = $this->Usuarios_model->buscarUsuariosDB('*','usuarios', array());
		$result = array();

		foreach ($resultLista as $key => $value) {
			$result['data'][] = array(
				$value['id'],
				$value['nome'],
				$value['email'],
				$value['dt_nascimento'],
				$value['telefone']
			);
		}
		print_r($result);
		return json_encode($result);
	}

}
