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
                <th scope="col">Cod venda</th>
                <th scope="col">Usuario</th>
                <th scope="col">Produto</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tr>
            <?php 
                include 'conexao.php';
                $sql = "SELECT v.id_venda, u.nome_usuario, p.nomeproduto from venda v
                left join usuarios u on u.id_usuario = v.id_usuario
                left join produtos p on p.id_produto = v.id_produto";
                $buscar = mysqli_query($conexao,$sql);

                while ($array = mysqli_fetch_array($buscar)) {
                    $venda = $array['id_venda'];
                    $usuario = $array['nome_usuario'];
                    $produto = $array['nomeproduto'];
                
            ?>
                <td><?php echo $venda ?></td>
                <td><?php echo $usuario ?></td>
                <td><?php echo $produto ?></td>
                <td>
                    <?php 
                        if (($nivel == 1) || ($nivel == 2)) { 
                    ?>
                    <a class="btn btn-sm btn-warning" style="color:#fff" href="editar_venda.php?id=<?php echo $id_venda?>"><i class="far fa-edit"></i>&nbsp;Editar</a>
                    <?php } ?>
                    <?php 
                        if ($nivel == 1) { 
                    ?>
                    <a class="btn btn-sm btn-danger" style="color:#fff" data-confirm-prod="Deseja excluir o produto?" href="_excluir.php?delprod=<?php echo $id_venda?>"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
                    <?php } ?>
                </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php
    include 'footer.php'
?>