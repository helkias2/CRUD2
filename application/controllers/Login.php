<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    //metodo constructo
    public function __construct(){
        parent::__construct();
    }

    //metodo de autenticacao
    public function autenticar(){
        //chando o banco

        $this->load->model("usuarios_model", 'user'); 
        if($this->input->post()){
            $email = $this->input->post('email');
            $senha = md5($this->input->post('senha'));
        }
        $userLoga = $this->user->logarUsuario($email, $senha);


        if(isset($userLoga)){
            $this->session->set_userdata("usuario_logado", $userLoga);
            $this->session->set_flashdata("success", "Logado com sucesso");
        }else{
            $this->session->set_flashdata('danger', 'Usuario ou senha invalida!');   
        }
        //redirecionado a pagina para inicio
        redirect('/');
    }

    public function logout(){
        $this->session->unset_userdata("usuario_logado");
        $this->session->set_flashdata("success", "Deslogado com sucesso!");
        redirect('/');
    }
}
