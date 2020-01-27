<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function insert($produtos){
        $this->db->insert('tbproduto',$produtos);
    }   

    public function read(){
        return $this->db->get('tbproduto')->result_array();
    }

    public function details($id){
        return $this->db->get_where("tbproduto", array("id" => $id))->row_array();
    }

    public function delete($id){
        $this->db->where("id",$id);
        $this->db->delete('tbproduto');
        return TRUE;
    }

    public function save($id, $produtos){
        
        $this->db->where("id",$id);
        $this->db->update('tbproduto',$produtos);
        return TRUE;
    }
}
