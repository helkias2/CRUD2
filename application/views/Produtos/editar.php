
   
    <div class="container">

<?php if($this->session->flashdata("success")): ?>
   <p class="alert alert-success"><?php echo $this->session->flashdata("success") ?></p>
<?php endif ?>    

<?php if($this->session->flashdata("danger")): ?>
   <p class="alert alert-danger"><?php echo $this->session->flashdata("danger") ?></p>
<?php endif ?>   

<?php if($this->session->userdata("usuario_logado")): ?>

    <h1>Editar - Formulario</h1>
    <div>
            <?php
            echo form_open('produtos/salvar');

            echo form_input(array(
                "type" => "hidden",
                "name" => "id",
                "ïd" => "id",
                "class" => "form-control",
                "maxlength" =>"255",
                "value" => $produtos['id']
            ));

            echo form_label("Nome:","nome");
            echo form_input(array(
                "type" => "text",
                "name" => "nome",
                "ïd" => "nome",
                "class" => "form-control",
                "maxlength" =>"255",
                "value" => $produtos['nome']
            ));

            echo form_error('nome', "");

            echo form_label("Preco:","preco");
            echo form_input(array(
                "name" => "preco",
                "ïd" => "preco",
                "class" => "form-control",
                "maxlength" =>"255",
                "value" => $produtos['preco']
            ));
            echo form_error('preco', "");

            echo form_label("Descricao:","descricao");
            echo form_textarea(array(
                "name" => "descricao",
                "ïd" => "descricao",
                "class" => "form-control",
                "maxlength" =>"255",
                "value" => $produtos['descricao']
            ));
            echo form_error('Descricao', "");

            echo form_button(array(
                "class" =>"btn btn-primary",
                "type" => "submit",
                "content" => "Adicionar"                    
            ));

            echo anchor('produtos/index', 'Voltar', array('class' => 'btn btn-primary'));
          
            echo form_close();
            ?>
            
    </div>
    <br><br>

   
 <?php endif;?>
