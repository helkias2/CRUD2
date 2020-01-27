
   
    <div class="container">
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Preco</th>
            </tr>
            <tr>
                <td><?= $produtos['nome']?></td>
                <td><?= $produtos['descricao']?></td>
                <td><?= $produtos['preco']?></td>
            </tr>

        </table>
        <?=anchor("produtos/index", 'Voltar', array("class" => "btn btn-primary"));?>
