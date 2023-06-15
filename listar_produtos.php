<?php 
    include 'header.php';
?>
<div class="container" style="margin-top: 40px;">
    <h4>Lista de Produtos</h4>
    <?php 
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Cod Produto</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tr>
            <?php 
            // left join entre tabela categoria e fornecedor.
                include 'conexao.php';
                $sql = "SELECT p.id_produto, p.nroproduto, p.nomeproduto, c.nome_categoria, p.quantidade, f.nome_fornecedor 
                        from produtos p 
                        left join categoria c on c.id_categoria = p.id_categoria
                        left join fornecedor f on f.id_fornecedor = p.id_fornecedor";
                $buscar = mysqli_query($conexao,$sql);

                while ($array = mysqli_fetch_array($buscar)) {
                    $id_produto = $array['id_produto'];
                    $nroproduto = $array['nroproduto'];
                    $nomeproduto = $array['nomeproduto'];
                    $categoria = $array['nome_categoria'];
                    $quantidade = $array['quantidade'];
                    $fornecedor = $array['nome_fornecedor'];
                
            ?>
                <td><?php echo $nroproduto ?></td>
                <td><?php echo $nomeproduto ?></td>
                <td><?php echo $categoria ?></td>
                <td><?php echo $quantidade ?></td>
                <td><?php echo $fornecedor ?></td>

                <td>
                    <?php 
                        if (($nivel == 1) || ($nivel == 2)) { 
                    ?>
                    <a class="btn btn-sm btn-warning" style="color:#fff" href="editar_produto.php?id=<?php echo $id_produto?>"><i class="far fa-edit"></i>&nbsp;Editar</a>
                    <?php } ?>
                    <?php 
                        if ($nivel == 1) { 
                    ?>
                    <a class="btn btn-sm btn-danger" style="color:#fff" data-confirm-prod="Deseja excluir o produto?" href="_excluir.php?delprod=<?php echo $id_produto?>"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                    <?php } ?>
                </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php
    include 'footer.php'
?>