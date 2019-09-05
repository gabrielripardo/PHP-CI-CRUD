<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form');
        }
        

        public function salvar(){                                      
                $cpf          = $this->input->post('cpf');
                $curriculo    = $_FILES['curriculo'];
                $configuracao = array(
                        'upload_path'   => './fotos/',
                        'allowed_types' => 'jpg',
                        'file_name'     => $cpf.'.jpg',
                        'max_size'      => '100000',
                        'max_width:'    => '100000',
                        'max_height'    => '100000'
                );      
                $this->load->library('upload');
                $this->upload->initialize($configuracao);
                if ($this->upload->do_upload('curriculo'))
                        echo 'Arquivo salvo com sucesso.';
                else
                        echo $this->upload->display_errors();                                   
        }
}
?>