<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    
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

	public function addUsuario(){
			// Ordem: id, nome, email, telefone, data_nascimento
			$nome = $this->input->post('nome');
			$email = $this->input->post('email');
			$dt_nascimento = $this->input->post('dt_nascimento');
			$telefone = $this->input->post('telefone');

			$data = array(
				'nome' => $nome,
				'email' => $email,
				'telefone' => $telefone,
				'data_nascimento'=> $dt_nascimento
			);

			$this->load->model('Usuarios_model');	
			$insert = $this->Usuarios_model->addUsuarioDados($data);
			echo json_encode($insert);
		}

	public function getDadosEditaveis(){
		$id = $this->input->post('id');
		$resultadoDados = $this->Usuarios_model->buscarDadosUnicos('*', 'tb_usuarios', array('id' => $id));

		echo json_encode($resultadoDados);
	}

	public function atualizaUsuario(){
		
		$id = $this->input->post('id');
		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$dt_nascimento = $this->input->post('dt_nascimento');
		$telefone = $this->input->post('telefone');

		$data = array(
			'nome' => $nome,
			'email' => $email,
			'telefone' => $telefone,
			'data_nascimento'=> $dt_nascimento
		);

		$this->load->model('Usuarios_model');	
		$update = $this->Usuarios_model->atualizaUsuarioDados('tb_usuarios', $data ,array('id' => $id));
		
		if($update == true){
			echo 1;
		} else {
			echo 2;
		}
	}

	public function deleteUsuario(){
		$id = $this->input->post('id');
		$dadosDeletados = $this->Usuarios_model->deletarUsuario('tb_usuarios', array('id' => $id));
		if($dadosDeletados == true){
			echo 1;
		} else {
			echo 2;
		}
	}

}
