<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

  public function index()
  {
    return $this->db->get("usuarios")->result_array();
  }
	
		public function addUsuarioDados($data){
			return $query = $this->db->insert('usuarios', $data);
	}

	public function buscarUsuariosDB($data, $tablename, $where){
		$query = $this->db->select($data)
											-> from($tablename)
											-> where($where)
											-> get();
											
		return $query->result_array();
	}

	// função para a barra de pesquisas
	public function buscarDadosUnicos($data, $tablename, $where){
		$query = $this->db->select($data)
											-> from($tablename)
											-> where($where)
											-> get();
											
		return $query->row_array();
	}

	public function atualizaUsuarioDados($tablename, $data, $where){
		return $query = $this->db->update($tablename, $data, $where);
	}

	public function deletarUsuario($tablename, $where){
		return $query = $this->db->delete($tablename, $where);
	}
}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */
