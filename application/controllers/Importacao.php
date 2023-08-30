<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller importacao
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

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
		if (!$_FILES['arquivo']){
			echo "a mano, n achamo ele n tlgd?";
		} else {
			echo "o bichao ta ai mano, o problema e vc";
			print_r($_FILES['arquivo']);
		}

        $config['upload_path'] 		= './views/temp/csv-files';
        $config['allowed_types'] 	= 'csv|xlsx|xls|ods';
        $name 						= $_FILES["arquivo"]["name"];
        $ext 						= explode(".", $name);
        $ext 						= end($ext);
        $ext 						= strtolower($ext);
        $nome 						= explode(".", $name);
        $nome 						= reset($nome);
        $nome 						= strtolower($nome);
        $agora 						= str_replace(array(" ", "."), array("", ""), microtime());
        $nomelimpo 					= $this->funcoes->createSlug($nome);
        $config['file_name'] 		= strtolower($agora . '_' . $nomelimpo . '.' . $ext);

        // $this->load->library('upload', $config);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload("arquivo")) {
			$this->session->set_flashdata('msg_erro', 'Náo foi possível enviar o arquivo. ' . $this->upload->display_errors());
			$this->index();
		} else {
			
		}    // if (!$this->upload->do_upload('userfile')) {
        //     $error = array('error' => $this->upload->display_errors());
		// 	echo "A mano tlg ne deu problema dog";
		// 	print_r ($error);
        // } else {
        //     $data = array('upload_data' => $this->upload->data());
		// 	echo "Boa dog, sabe mt slk";
        // }

        // print_r($config);
    }
}

/* End of file importacao.php */
/* Location: ./application/controllers/importacao.php */
