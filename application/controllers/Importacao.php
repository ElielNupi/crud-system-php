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

  public function index() {
    $params = array(
      'js_files' => array (
          'assets/js/vue.js',
          'assets/node_modules/jquery/dist/jquery.min.js',
          'assets/node_modules/axios/dist/axios.min.js',
				  'assets/js/main.js',
          'assets/js/mixins/Mixins.js',
          'assets/js/mixins/Mixin_importacao.js',
          'assets/js/controllers/ImportacaoController.js',
      ),
    );
    
    // FAZER CONDIÇÃO PARA QUE: CASO EXISTA USUARIOS CADASTRADOS NO BANCO = CARREGUE A VIEW DELETAR TODOS USUARIOS, CASO NAO TENHA NENHUM USUARIO NO BANCO, CARREGUE A VIEW importacao

    $this->load->model("Usuarios_model","usuarios");
    
    $result_linhas = $this->usuarios->getAllUsuarios("usuarios");
    
    if ($result_linhas > 0 ){
      $data = array(
        'params' => $params,
        'pagina' => $this->load->view("paginas/importacao/view_imp_delete_usuarios", array(), TRUE),
      );
    } else if ($result_linhas <= 0) {
      $data = array(
        'params' => $params,
        'pagina' => $this->load->view("paginas/importacao/view_importacao_usuarios", array(), TRUE),
      );
    }

    $this->load->view('templates/view_geral', $data);
  }

  public function importarDados () {
		
    // importando dados de um arquivo csv para sql
   // Verifica se o arquivo foi enviado
   if (isset($_FILES['arquivo_csv'])) {
    $arquivo = $_FILES['arquivo_csv'];
    
    // Verifica se ocorreu algum erro no upload do arquivo
    if ($arquivo['error'] === UPLOAD_ERR_OK) {
        $conteudoArquivo = file_get_contents($arquivo['tmp_name']);
        
        // Aqui você pode fazer as verificações e manipulações necessárias com o conteúdo do arquivo CSV
        
        // Exemplo de retorno de sucesso com o conteúdo do arquivo
        $resposta = array('status' => 'success', 'message' => 'Arquivo enviado com sucesso!', 'conteudo' => $conteudoArquivo);
        
        var_dump($resposta);
    } else {
        // Exemplo de retorno de erro
        $resposta = array('status' => 'error', 'message' => 'Erro ao fazer o upload do arquivo!');
    }
} else {
    // Exemplo de retorno de erro caso nenhum arquivo tenha sido enviado
    $resposta = array('status' => 'error', 'message' => 'Nenhum arquivo enviado!');
}

// Retorna a resposta como JSON
echo json_encode($resposta);
    /* 
      $data = array();
    $memData = array();
      // If import request is submitted    
      if($this->input->post('importSubmit')){
        // Form field validation rules
        $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
        
        // Validate submitted form data
        if($this->form_validation->run() == true) {
              $insertCount = $updateCount = $rowCount = $notAddCount = 0;
      
              // If file uploaded
              if(is_uploaded_file($_FILES['file']['tmp_name'])){
                  // Load CSV reader library
                  $this->load->library('CSVReader');
                  
                  // Parse data from CSV file
                  $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
            }
          
            if (!empty($csvData)) {
              echo "Funcionou";
            } else {
              echo "N deu";
            }
        }
    }*/
  }
}


/* End of file importacao.php */
/* Location: ./application/controllers/importacao.php */
