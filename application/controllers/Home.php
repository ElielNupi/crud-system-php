<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}

	public function index()
	{
        $this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('pages/view_home');
	}

	public function buscarDados(){

		$resultadoLista = $this->Usuarios_model->buscarUsuariosDB('*','tb_usuarios', array());
		$result = array();
		$editButton = '';
		$removeButton = '';

		$i = 1;

		foreach ($resultadoLista as $key => $value) {

			$actionButton = '<a href="#" onclick="editFun('.$value['id'].')"><i class="material-icons" title="Edit">&#xE254;</i></a> 
			
			<a href="#" class="delete" onclick="deleteFun('.$value['id'].')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';

			$result['data'][] = array(
				$value['id'],
				$value['nome'],
				$value['email'],
				$value['data_nascimento'],
				$value['telefone'],
				$actionButton,
			);
		}
		echo json_encode($result);
	}

}
