<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
    public function index() {
        return $this->db->get("usuarios")->result_array();
    }

    public function addUsuarioDados($data) {
        return $query = $this->db->insert('usuarios', $data);
    }

    public function atualizaUsuarioDados($tablename, $data, $where) {
        return $query = $this->db->update($tablename, $data, $where);
    }

    public function deletarUsuario($tablename, $where){
        return $query = $this->db->delete($tablename, $where);
    }

	public function getUsuarios($data, $tablename, $like, $limit, $offset){
		$query = $this->db->select($data)
			->from($tablename)
			->like($like)
			->order_by('id')
			->limit($limit)
			->offset($offset)
			->get();
		return $query->result();
	}

	public function buscarLinhas ($data, $tablename, $where) {
		$query = $this->db->select($data)
							->from($tablename)
							->where($where)
							->get();
		return $query->result();
	}
	
	public function getAllUsuarios ($tablename) {
		return $query = $this->db->count_all_results($tablename);
	}

	public function getAllporNome ($tablename, $where) {
		$this->db->like($where);
		$this->db->from($tablename);
		return $this->db->count_all_results();
	}

	public function deleteAllUsuarios ($tablename) { 
		try {
			$query = $this->db->empty_table($tablename);
			$result = "ok";
		} catch (Exception $e) {
			$result = "ERRO DATABASE: ". $e->getMessage() . "\n";
		}

		return $result;
	}

	public function importar ($tablename, $data) {
		try {
			$this->db->insert($tablename, $data);
			$result = "ok";
		} catch(Exception $e){
			$result = "ERRO DATABASE: ". $e->getMessage() . "\n";
		}

		return $result;
	}

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */
