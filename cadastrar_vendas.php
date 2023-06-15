<?php 
    include 'header.php';
?>
    <div class="container" id="tamanhoContainer" style="margin-top: 40px;">
        <h4>Cadastro de Venda</h4>
        <?php 
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form action="_inserir.php" method="post">
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
                  <option value="<?php echo$id_usuario ?>" ><?php echo $nome_usuario ?></option>
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
                  <option value="<?php echo$id_produto ?>" ><?php echo $nomeproduto ?></option>
                <?php } ?>
                </select>
            </div>
            <div style="text-align: right">
                <button type="submit" name="insertvend" class="btn btn-sm btn-success">Cadastrar</button>
            </div>
        </form>
    </div>

<?php 
    include 'footer.php';
?>