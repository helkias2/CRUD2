<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
    <div class="container">

    <?php if($this->session->flashdata("success")): ?>
       <p class="alert alert-success"><?php echo $this->session->flashdata("success") ?></p>
    <?php endif ?>    

    <?php if($this->session->flashdata("danger")): ?>
       <p class="alert alert-danger"><?php echo $this->session->flashdata("danger") ?></p>
    <?php endif ?>   
    <?php if($this->session->userdata("usuario_logado")): ?>

    <h1>Lista de Produtos</h1>
    
    <table class="table table-responcibli">
        <tr style="background:red; color:#fff">
            <th>ID</th>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Preco</th>
            <th>Detalhe</th>
            <th>Editar</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($produtos as $key => $value): ?>
        <tr>
            <td><?=  $value['id']?></td>
            <td><?=  $value['nome']?></td>
            <td><?=  $value['descricao']?></td>
            <td><?= reais($value['preco'])?></td>
            <td><?= anchor("produtos/detalhes?id={$value['id']}", 'Detalhe', array("class" => 'btn btn-primary'));?></td>
            <td><?= anchor("produtos/editar?id={$value['id']}", 'Edite', array("class" => 'btn btn-primary'));?></td>
            <td><?= anchor("produtos/deletar?id={$value['id']}", 'Delete', array("class" => 'btn btn-danger'));?></td>
        </tr>
        <?php endforeach;?>
    </table>

    <?php echo anchor("produtos/formulario", "Add Produtos", array("class" => "btn btn-primary")) ?>

    <?= anchor("login/logout", "Sair", array("class" => "btn btn-primary"))?>

    <?php else: ?>
        <h1>Fazer Login</h1>
        <div>
                <?php
                echo form_open('login/autenticar');

             
                echo form_label("Email:","emial");
                echo form_input(array(
                    "type" => "email",
                    "name" => "email",
                    "ïd" => "email",
                    "class" => "form-control",
                    "maxlength" =>"255"
                ));

                echo form_label("Password:","password");
                echo form_input(array(
                    "type" => "password",
                    "name" => "senha",
                    "ïd" => "senha",
                    "class" => "form-control",
                    "maxlength" =>"255"
                ));

                echo form_button(array(
                    "class" =>"btn btn-primary",
                    "type" => "submit",
                    "content" => "Logar"                    
                ));
              
                echo form_close();
                ?>

        </div>
        <br><br>

        <h1>Cadastro</h1>
        <div>
                <?php
                echo form_open('usuarios/novo');

                echo form_label("Nome:","nome");
                echo form_input(array(
                    "name" => "nome",
                    "ïd" => "nome",
                    "class" => "form-control",
                    "maxlength" =>"255"
                ));

                echo form_label("Email:","emial");
                echo form_input(array(
                    "type" => "email",
                    "name" => "email",
                    "ïd" => "email",
                    "class" => "form-control",
                    "maxlength" =>"255"
                ));

                echo form_label("Password:","password");
                echo form_input(array(
                    "type" => "password",
                    "name" => "senha",
                    "ïd" => "senha",
                    "class" => "form-control",
                    "maxlength" =>"255"
                ));

                echo form_button(array(
                    "class" =>"btn btn-primary",
                    "type" => "submit",
                    "content" => "Cadastrar"                    
                ));
              
                echo form_close();
                ?>

        </div>
            <?php endif;?>
   