<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index(){
        $this->load->model('produtos_model');
        $lista = $this->produtos_model->read();
        $dados = array("produtos" => $lista);

        $this->load->view('templates/header');
        $this->load->view('produtos/index', $dados);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }
    
    public function formulario(){
        $this->load->view('templates/header');
        // $this->load->view('produtos/index');
        $this->load->view("produtos/formulario");
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
    }

    public function novo (){
       // validacoes no formularios 
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|callback_nao_exemplo');
        $this->form_validation->set_rules('preco', 'Preco', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>");
        if($this->form_validation->run() == TRUE){
            $userId = $this->session->userdata("usuario_logado");
            $produtos = array(
                "nome" => $this->input->post('nome'),
                "preco" => $this->input->post('preco'),
                "descricao" => $this->input->post('descricao'),
                "user_id" => $userId['id']
            );
    
            $this->load->model("produtos_model", 'prod');
            $this->prod->insert($produtos);
            $this->session->set_flashdata("success", "Produtos cadastrados com sucesso!");
            redirect('/');
        }else{
            // redirect('produtos/formulario');
            $this->load->view('templates/header');
            // $this->load->view('produtos/index');
            $this->load->view("produtos/formulario");
            $this->load->view('templates/footer');
            $this->load->view('templates/js');
        //    $this->load->view('produtos/formulario');
        }
    }
    // detalhar o produto
    public function detalhes(){
        $id = $this->input->get('id');
        $this->load->model("produtos_model", 'prod');
        $produto = $this->prod->details($id);
        $dados = array("produtos" => $produto);

        $this->load->view('templates/header');
        $this->load->view('produtos/detalhes', $dados);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
        // $this->load->view('produtos/detalhes', $dados);

    }

    public function deletar(){
        $id = $this->input->get('id');
        $this->load->model("produtos_model", 'prod');
        $this->prod->delete($id);
        $this->session->set_flashdata('success', 'Produto Deletado com sucesso!');
        
        redirect('/','refresh');
    }

    public function editar(){
        $id = $this->input->get('id');
        $this->load->model("produtos_model", 'prod');
        $produto = $this->prod->details($id);
        $dados = array(
            'produtos' => $produto
        );

        $this->load->view('templates/header');
        $this->load->view('produtos/editar', $dados);
        $this->load->view('templates/footer');
        $this->load->view('templates/js');

    }

    public function salvar(){


        // $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|callback_nao_exemplo');
        // $this->form_validation->set_rules('preco', 'Preco', 'trim|required|min_length[1]');
        // $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');
        // $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>");
        
        // if($this->form_validation->run() == TRUE){

            $id = $this->input->post('id');
            $prod = array(
                "nome" => $this->input->post('nome'),
                "preco" => $this->input->post('preco'),
                "descricao" => $this->input->post('descricao'),
            );
            
            $this->load->model("produtos_model", 'prod');
            $this->prod->save($id, $prod);
            $this->session->set_flashdata("success", "Produtos cadastrados com sucesso!");
   
        
        // $this->load->view('templates/header');
        // $this->load->view('produtos/index');
        // $this->load->view('templates/footer');
        // $this->load->view('templates/js');
        redirect('/',);
        
    }

    public function nao_exemplo($nome){
        $posicao = strpos($nome,"exemplo");
        if($posicao != FALSE){
            return TRUE;
        }else{
            $this->form_validation->set_message("nao exemplo", "O campo '%s' nao pode conter a palavra EXEMPLO!");
        }
    }
}
