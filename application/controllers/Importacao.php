<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Importacao extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->model("Usuarios_model", "usuarios");

        $result_linhas = $this->usuarios->getAllUsuarios("usuarios");

        if ($result_linhas > 0) {

            $params = array(
                'js_files' => array(
                    'assets/js/vue.js',
                    'assets/node_modules/jquery/dist/jquery.min.js',
                    'assets/node_modules/axios/dist/axios.min.js',
                    'assets/js/main.js',
                    'assets/js/mixins/Mixins.js',
                    'assets/js/mixins/Mixin_importacao.js',
                    'assets/js/controllers/PreImportacaoController.js',
                ),
            );

            $data = array(
                'params' => $params,
                'pagina' => $this->load->view("paginas/importacao/view_imp_delete_usuarios", array(), true),
            );

        } else if ($result_linhas <= 0) {

            $params = array(
                'js_files' => array(
                    'assets/js/vue.js',
                    'assets/node_modules/jquery/dist/jquery.min.js',
                    'assets/node_modules/axios/dist/axios.min.js',
                    'assets/js/main.js',
                    'assets/js/mixins/Mixins.js',
                    'assets/js/mixins/Mixin_importacao.js',
                    'assets/js/controllers/ImportacaoController.js',
                ),
            );

            $data = array(
                'params' => $params,
                'pagina' => $this->load->view("paginas/importacao/view_importacao_usuarios", array(), true),
            );
        }

        $this->load->view('templates/view_geral', $data);
    }

    public function Upload()
    {
        // Passos -> Upload vindo do html -> armazenar no sistema -> ler o arquivo e suas colunas -> loop para cadastrar no banco de dados -> verficar se foi sucess ou nao -> deletar o arquivo temporario.
        if (!$_FILES['arquivo']) {

        } else {

            print_r($_FILES['arquivo']);
        }

        $config['upload_path'] = './assets/temp/csv-files/';
        $config['allowed_types'] = 'csv|xlsx|xls|ods';
        $name = $_FILES["arquivo"]["name"];
        $ext = explode(".", $name);
        $ext = end($ext);
        $ext = strtolower($ext);
        $nome = explode(".", $name);
        $nome = reset($nome);
        $nome = strtolower($nome);
        $agora = str_replace(array(" ", "."), array("", ""), microtime());
        $nomelimpo = $this->funcoes->createSlug($nome);
        $config['file_name'] = strtolower($agora . '_' . $nomelimpo . '.' . $ext);

        $this->load->library('upload', $config);

		$this->upload->initialize($config);

        if (!$this->upload->do_upload('arquivo')) {
            $error = array('error' => $this->upload->display_errors());
			echo "1";
			var_dump($error);
        } else {
			$this->load->library('ConversaoPlanilha');

			set_time_limit(360);

			$lista = $this->conversaoplanilha->ler_arquivo_usuarios($config['upload_path'] . $config['file_name']);

			if ($lista['status'] == 'ok') {
				foreach ($lista['data'] as $p){
					$this->load->model("usuarios_model", "usuarios");
					$this->usuarios->addUsuarioDados($p);
				}

			} else {
				var_dump ($lista['data']);	
				var_dump ($lista['status']);	
				echo "deu erro";
			}

            $data = array('upload_data' => $this->upload->data());
			unlink($config['upload_path'] . $config['file_name']);
			redirect("");
        }
    }
}

/* End of file importacao.php */
/* Location: ./application/controllers/importacao.php */
