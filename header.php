<?php
    session_start();

    $usuario = $_SESSION['usuario'];
    $nivel = $_SESSION['nivelusuario'];
    if (!isset($_SESSION['usuario'])) {
      header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StockPro</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/style.css">
    <script src="https://kit.fontawesome.com/963d9be9b3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="pt-5">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="menu.php">StockPro</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PRODUTO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php 
                                if (($nivel == 1) || ($nivel == 2)) {
                                
                            ?>
                            <a class="dropdown-item" href="cadastrar_produtos.php">Cadastrar Produto</a>
                            <?php }?>
                            <a class="dropdown-item" href="listar_produtos.php">Listar Produto</a>                    
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CATEGORIA
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php 
                                if (($nivel == 1) || ($nivel == 2)) {
                                
                            ?>
                            <a class="dropdown-item" href="cadastrar_categoria.php">Cadastrar Categoria</a>
                            <?php }?>
                            <a class="dropdown-item" href="listar_categoria.php">Listar Categoria</a>                    
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        FORNECEDOR
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php 
                                if (($nivel == 1) || ($nivel == 2)) {
                                
                            ?>
                            <a class="dropdown-item" href="cadastrar_fornecedor.php">Cadastrar Fornecedor</a>
                            <?php }?>
                            <a class="dropdown-item" href="listar_fornecedor.php">Listar Fornecedor</a>
                        </div>
                    </li>
                    <?php 
                        if ($nivel == 1) {
                        
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        VENDAS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php 
                                if (($nivel == 1) || ($nivel == 2)) {
                                
                            ?>
                            <a class="dropdown-item" href="cadastrar_vendas.php">Cadastrar Venda</a>
                            <?php }?>
                            <a class="dropdown-item" href="listar_vendas.php">Listar Vendas</a>                    
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        USUÁRIO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="cadastrar_usuario.php">Cadastrar Usuário</a>
                            <a class="dropdown-item" href="listar_usuarios.php">Listar Usuários</a>                    
                            <a class="dropdown-item" href="aprovar_usuario.php">Aprovar Usuários</a>                    
                        </div>
                    </li>
                    <?php }?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <span class="dropdown-item disabled"><i class="far fa-user"></i>&nbsp;<?php echo $usuario?></span>
                            <a class="dropdown-item " href="_logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Sair</a>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
      </div>
