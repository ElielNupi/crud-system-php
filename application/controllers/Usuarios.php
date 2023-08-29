<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($query)
    {
        $dados = json_decode($this->input->raw_input_stream);
        $retorno = array();

        switch ($query) {
            case 'usuarios':
                $retorno = $this->_list_usuarios($dados);
                break;
        }
        $this->_saida(json_encode($retorno));
    }

    public function criarUsuario()
    {
        $obj = json_decode($this->input->raw_input_stream);

        $nome = $obj->{"nome"};
        $telefone = $obj->{"telefone"};
        $email = $obj->{"email"};
        $dt_nascimento = $obj->{"dt_nascimento"};

        $data = array(
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'dt_nascimento' => $dt_nascimento,
        );

        $this->load->model('Usuarios_model');
        $insert = $this->Usuarios_model->addUsuarioDados($data);
        echo json_encode($insert);
    }

    public function atualizaUsuario()
    {
        $obj = json_decode($this->input->raw_input_stream);

        $id = $obj->{"id"};
        $nome = $obj->{"nome"};
        $telefone = $obj->{"telefone"};
        $email = $obj->{"email"};
        $dt_nascimento = $obj->{"dt_nascimento"};

        $data = array(
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'dt_nascimento' => $dt_nascimento,
        );

        $this->load->model('Usuarios_model');
        $update = $this->Usuarios_model->atualizaUsuarioDados('usuarios', $data, array('id' => $id));
        echo json_encode($update);
        if ($update == true) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function deletarUsuario($idUsuario)
    {
        $this->load->model('Usuarios_model');
        $dadosDeletados = $this->Usuarios_model->deletarUsuario('usuarios', array('id' => $idUsuario));
        if ($dadosDeletados == true) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function _list_usuarios($dados)
    {
        $this->load->model("Usuarios_model", "usuario");

        	//resgatando valores vindo do js
			$nome = $dados->{"nome"};
			$pagina = $dados->{"pagina"};
			$por_pagina = $dados->{"por_pagina"};
			$tipo_busca = $dados->{"tipo"};

        if ($tipo_busca == 'por_nome') {
			
            // buscando linhas do banco para definir paginas
            $total_linhas = $this->usuario->getAllporNome("usuarios", array('nome' => $nome));
            $proximo_index_pagina = ($pagina > 1 ? ($pagina - 1) * $por_pagina : 0);
            $total_paginas = ceil(($total_linhas / $por_pagina));

            // buscando usuarios do banco
            $resultUsuarios = $this->usuario->getUsuarios('*', 'usuarios', array('nome' => $nome), $por_pagina, $proximo_index_pagina);

        } else {

            // buscando linhas do banco para definir paginas

            $total_linhas = $this->usuario->getAllUsuarios("usuarios");
            $proximo_index_pagina = ($pagina > 1 ? ($pagina - 1) * $por_pagina : 0);
            $total_paginas = ceil(($total_linhas / $por_pagina));

            // buscando usuarios do banco
            $resultUsuarios = $this->usuario->getUsuarios('*', 'usuarios', array(), $por_pagina, $proximo_index_pagina);
        }

        $data = array(
            'data' => $resultUsuarios,
            'pages' => $total_paginas,
            'page' => $pagina,
            'count' => $total_linhas,
            'per_page' => $por_pagina,
        );

        $retorno = array(
            'status' => 'ok',
            'data' => $data,
        );

        return $retorno;
    }
	public function importarCSV ()
	{
		$dados = json_decode($this->input->raw_input_stream);
		// Usar a library aqui
		$this->load->library("PhpSpreadsheet", NULL, "formatar");
		$this->formatar->formatandoToCsv();
	}
    public function exportarCSV()
    {
        $this->load->model('Usuarios_model', 'usuario');
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        echo $currentDate;

        // Dados dos usuários do banco de dados
        $usuarios = $this->usuario->getUsuarios('*', 'usuarios', array() , '25', '0'); // Substitua com o método apropriado do seu modelo

        // Cabeçalhos do arquivo CSV
        $csvData = "Id, Nome, Email, Data Nascimento, Telefone\n";

        // Preenchendo os dados do CSV
        foreach ($usuarios as $usuario) {
            $csvData .= "{$usuario['id']}, {$usuario['nome']}, {$usuario['email']}, {$usuario['dt_nascimento']}, {$usuario['telefone']}\n";
        }

        // Definindo o nome do arquivo e headers para download
        $nome_arquivo = 'usuarios.csv';
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $nome_arquivo . '"');

        // Saída do conteúdo do CSV
        echo $csvData;
        exit;
    }

	public function apagarTodosUsuarios() {

		$load->this->model("Usuarios_model", "usuarios");
		$apagando = $this->load->usuarios->deleteAllUsuarios ("usuarios");
		
		if ($apagando == "ok"){
			$data = array ("
				'status': 'alive'
			");
		} else {
			$data = array ("
				'status' : 'death'
			");
		}
		return $data;
	}
    private function _saida($out)
    {
        header('Content-Type: application/json');
        $callback = $this->input->get('callback');
        if ($callback) {
            $out = sprintf('%s(%s);', $callback, $out);
        }
        echo $out;
        session_write_close();
    }

}

/*como posso mapear os valores desse objeto em variaveis no php */
// Retornar um array junto com os dados dos usuarios(lista), e nesse array conter os dados da pagina(atual), o total de usuarios, count
