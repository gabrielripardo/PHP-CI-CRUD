<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index(){
		$this->load->model("produtos_model");
		$lista = $this->produtos_model->buscaTodos();
		$dados = array("produtos" => $lista);
		$this->load->view('produtos/index', $dados); //Chama a view
	}
	public function formulario(){
		$this->load->view('produtos/formulario');
	}
	public function novo(){
        $produto = array(
			"nome" => $this->input->post("nome"),
			"preco" => $this->input->post("preco"),
			"description" => $this->input->post("description")
		);
		$this->load->model("produtos_model");
		$this->produtos_model->salva($produto);
		//$this->session->set_flashdata("success", "Produto cadastrado com sucesso!");
		redirect('/');
    }
}
