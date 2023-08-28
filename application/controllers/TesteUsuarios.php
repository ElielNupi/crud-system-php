<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TesteUsuarios extends CI_Controller
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

    public function Listando()
    {
		//resgatando valores vindo do js
		$tipo_busca = "por_nome";
		$nome = "Alonso";
		$pagina = 1;
		$por_pagina = 11; 

        $this->load->model("Usuarios_model", "usuario");
        if ($tipo_busca == 'por_nome') {
            
            // buscando linhas do banco para definir paginas
            $total_linhas = $this->usuario->getAllporNome ("usuarios", array('nome' => $nome));
            $proximo_index_pagina = ($pagina > 1 ? ($pagina - 1) * $por_pagina : 0);
            $total_paginas = ceil(($total_linhas / $por_pagina));

            // buscando usuarios do banco
            $resultUsuarios = $this->usuario->getUsuarios('*', 'usuarios', array('nome' => $nome), $por_pagina, $proximo_index_pagina);

        } else { // Busca Todos
            // buscando linhas do banco para definir paginas
						
            $total_linhas = $this->usuario->getAllUsuarios("usuarios");
            $proximo_index_pagina = ($pagina > 1 ? ($pagina - 1) * $por_pagina : 0);
            $total_paginas = ceil(($total_linhas / $por_pagina));

            // buscando usuarios do banco
            $resultUsuarios = $this->usuario->getUsuarios('*', 'usuarios', array(), $por_pagina, $proximo_index_pagina);
        }

        // $data = array(
        //     'data' => $resultUsuarios,
        //     'pages' => $total_paginas,
        //     'page' => $pagina,
        //     'count' => $total_linhas,
        //     'per_page' => $por_pagina,
        // );

        // $retorno = array(
        //     'status' => 'ok',
        //     'data' => $data,
        // );

				var_dump($total_linhas);
				var_dump($proximo_index_pagina);
				var_dump($total_paginas);
				var_dump($resultUsuarios);
        // return $retorno;
    }
    public function exportarCSV()
    {
        $this->load->model('Usuarios_model', 'usuario');
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        echo $currentDate;

        // dados dos usuários do banco de dados
        $usuarios = $this->usuario->getUsuarios('*', 'usuarios', array() , '25', '0'); // Substitua com o método apropriado do seu modelo

        // cabeçalhos do arquivo CSV
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


/* End of file TesteUsuarios.php */
/* Location: ./application/controllers/TesteUsuarios.php */
