<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
       
        // $this->load->model('usuarios_model', 'users');
    }

	public function novo(){
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        // $this->form_validation->set_rules('email', 'Email', 'trim|requider|min_length[3]');
        // $this->form_validation->set_rules('senha', 'Senha', 'trim|requider|min_length[3]');
        // print_r($_POST);
        if($this->input->post('nome')){

            $usuario = array(
                "nome" =>  $this->input->post('nome'),
                "email" => $this->input->post('email'),
                "senha" => md5($this->input->post('senha'))
            );
            $this->load->model('usuarios_model','users');
            $this->users->salva($usuario);

            $this->load->view('templates/header');
            // $this->load->view('produtos/index');
            $this->load->view('usuarios/novo'); 
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
            // $this->load->view('usuarios/novo');            
        }
      
	}
}
