<?php
class Produtos_model extends CI_model{
    public function buscaTodos(){
        return $this->db->get("products")->result_array(); //Tudo que tem na tabela products será retornada na função
    }

    public function salva($produto){
        $this->db->insert("products", $produto);
    }
    
}