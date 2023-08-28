<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $params = array(
            'js_files' => array(
                'assets/js/vue.js',
                'assets/node_modules/jquery/dist/jquery.min.js',
                'assets/node_modules/axios/dist/axios.min.js',
				'assets/js/main.js',
				'assets/js/mixins/Mixins.js',
				'assets/js/mixins/Mixin_usuarios.js',
                'assets/js/controllers/ListUsuariosController.js',
            ),
            'js_extra' => array(
                'assets/js/controllers/UsuariosController.js',
            ),
        );
        $paginaInterna = $this->load->view("paginas/view_add_usuario", array(), true);

        $data = array(
            'params' => $params,
            'pagina' => $this->load->view("paginas/view_lista_usuario", array('paginaInterna' => $paginaInterna), true),
        );

        $this->load->view('templates/view_geral', $data);
    }

}
