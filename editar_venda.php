<?php 
    include 'conexao.php';
    include 'header.php';
    $id = $_GET['id'];
?>
    <div class="container" id="tamanhoContainer" style="margin-top: 40px;">
        <h4>Editar Venda</h4>
        <form action="_atualizar.php" method="post">
            <input type="number" name="id" class="form-control" value="<?php echo $id?>" style="display:none">
            <?php 
                $sql = "SELECT * FROM `venda` WHERE id_venda = $id";
                $buscar = mysqli_query($conexao,$sql);
                
                while ($array = mysqli_fetch_array($buscar)) {
                    $produto = $array['id_produto'];
                    $usuario = $array['id_usuario'];
            ?>
            <div class="form-group">
                <label>Usuario</label>
                <select class="form-control" name="usuario" required>
                    <option>Selecione...</option>
                <?php
                    include 'conexao.php';
                    $sql = "SELECT * FROM `usuarios`";
                    $buscar = mysqli_query($conexao, $sql);
                    while ($array = mysqli_fetch_array($buscar)) {
                       $id_usuario = $array['id_usuario'];  
                       $nome_usuario = $array['nome_usuario'];  
                ?>
                  <option
                    value="<?php echo$id_usuario ?>"
                    <?php echo $id_usuario == $usuario ? 'selected' : ''?>
                ><?php echo $nome_usuario ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Produto</label>
                <select class="form-control" name="produto" required>
                    <option>Selecione...</option>
                <?php
                    include 'conexao.php';
                    $sql = "SELECT * FROM `produtos`";
                    $buscar = mysqli_query($conexao, $sql);
                    while ($array = mysqli_fetch_array($buscar)) {
                       $id_produto = $array['id_produto'];
                       $nomeproduto = $array['nomeproduto'];
                ?>
                  <option
                    value="<?php echo$id_produto ?>"
                    <?php echo $id_produto == $produto ? 'selected' : '' ?>
                ><?php echo $nomeproduto ?></option>
                <?php } ?>
                </select>
            </div>
            <div style="text-align: right">
                <a href="listar_vendas.php" class="btn btn-sm btn-warning">Voltar</a>
                <button type="submit" name="updatevend" class="btn btn-sm btn-success">Confirmar</button>
            </div>
            <?php }?>
        </form>
    </div>

<?php 
    include 'footer.php';
?>