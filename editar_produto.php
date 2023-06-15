<?php 
    include 'conexao.php';
    include 'header.php';
    $id = $_GET['id'];
?>
    <div class="container" id="tamanhoContainer" style="margin-top: 40px;">
        <h4>Editar Produto</h4>
        <form action="_atualizar.php" method="post">
            <?php 
                $sql = "SELECT * FROM `produtos` WHERE id_produto = $id";
                $buscar = mysqli_query($conexao,$sql);
                
                while ($array = mysqli_fetch_array($buscar)) {
                    $id_produto = $array['id_produto'];
                    $nroproduto = $array['nroproduto'];
                    $nomeproduto = $array['nomeproduto'];
                    $categoria = $array['id_categoria'];
                    $quantidade = $array['quantidade'];
                    $fornecedor = $array['id_fornecedor'];
            ?>
            <div class="form-group">
                <label>Código Produto</label>
                <input type="number" name="codigoproduto" class="form-control" value="<?php echo $nroproduto?>" placeholder="Insira o número do produto" disabled>
                <input type="number" name="id" class="form-control" value="<?php echo $id?>" style="display:none">
            </div>
            <div class="form-group">
                <label>Nome Produto</label>
                <input type="text" name="nomeproduto" class="form-control" value="<?php echo $nomeproduto?>" placeholder="Insira o nome do produto" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="categoria" required>
                    <option>Selecione...</option>
                <?php 
                    include 'conexao.php';
                    $sql = "SELECT * FROM `categoria`";
                    $buscar = mysqli_query($conexao,$sql);
                    while ($array = mysqli_fetch_array($buscar)) {
                       $nome_categoria = $array['nome_categoria'];  
                       $id_categoria = $array['id_categoria'];  
                ?>
                    <option 
                        value="<?php echo$id_categoria ?>"
                        <?php echo ($id_categoria == $categoria ? 'selected' : '') ?>
                    >
                        <?php echo $nome_categoria ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantidade" class="form-control" value="<?php echo $quantidade?>" placeholder="Insira a quantidade do produto">
            </div>
            <div class="form-group">
                <label>Fornecedor</label>
                <select class="form-control" name="fornecedor" required>
                    <option>Selecione...</option>
                <?php 
                    include 'conexao.php';
                    $sql = "SELECT * FROM `fornecedor`";
                    $buscar = mysqli_query($conexao,$sql);
                    while ($array = mysqli_fetch_array($buscar)) {
                       $nome_fornecedor = $array['nome_fornecedor'];
                       $id_fornecedor = $array['id_fornecedor'];
                ?>
                  <option
                    value="<?php echo $id_fornecedor ?>"
                    <?php echo ($fornecedor == $id_fornecedor ? 'selected': '') ?>
                ><?php echo $nome_fornecedor ?></option>
                <?php } ?>
                </select>
            </div>
            <div style="text-align: right">
                <a href="listar_produtos.php" class="btn btn-sm btn-warning">Voltar</a>
                <button type="submit" name="updateprod" class="btn btn-sm btn-success">Confirmar</button>
            </div>
            <?php }?>
        </form>
    </div>

<?php 
    include 'footer.php';
?>