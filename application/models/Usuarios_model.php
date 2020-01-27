<?php

class Usuarios_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function salva($user){
        $this->db->insert("tbusers", $user);
    }

    public function logarUsuario($email, $senha){
        //passando valor para where
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        //pego os resultdo de usuario e trago
        $usuario = $this->db->get("tbusers")->row_array();
        return $usuario;
    }
}