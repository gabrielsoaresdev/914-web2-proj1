<?php
require_once 'banco/UsuarioDAO.php';
require_once 'classes/Usuario.php';
        
session_start();
if (!$_SESSION['logado'] || !$_SESSION['is_admin']) {
    header('location: ./entrar.php?erro=2');
} else {
    $admin = (new UsuarioDAO())->selectUsuarioByUsername($_SESSION['username']);
}
?>
    
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Cadastro de produtos</title>
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a href="dashboard.php">
                    <img src="img/logo.svg">
                    <span class="text-white">ADM</span>
                </a> 
                    
                <div class="float-left dropdown">
                    <button id="btn-ola" class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá <?php
                            echo $admin->getNome();
                        ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="script_deslogar.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
            
        <form class="container py-3" action="./cadastro_produto.php" method="POST" enctype="multipart/form-data">
            <h3 class="row"> Cadastrar Produto </h3>
            <div class="row form-group">
                <input class="form-control" type="text" name="nome" placeholder="Coloque nome do produto aqui..." required="">
            </div>
            
            <div class="row form-group">
                <textarea class="form-control" rows="5" name="descricao" id="comment"></textarea>
            </div>

            <div class="row form-group custom-file">
                <input type="file" class="custom-file-input" name="arquivo" required>
                <label class="custom-file-label" for="arquivo">Adicione sua imagem aqui...</label>
            </div>

            <div class="row form-group">
                <input type="tel" class="form-control" name="preco" placeholder="Digite o preco aqui..." required="">
            </div>

            <div class="row form-group">
                <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade aqui..." required="">
            </div>

            <div class="row form-group">
                <label for="nome">Selecione a categoria:</label><br>
                <select name="categoria" class="form-control">
                    <?php
                        require_once './classes/Categoria.php';
                        require_once './banco/CategoriaDAO.php';
                    
                        $categorias = (new CategoriaDAO())->selectAll();
                        if($categorias == null) {
                            header('Location: ./cadastro_categoria.php?erro=1');
                        }
                        foreach ($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria->getId(); ?>">
                                <?php echo $categoria->getId(); ?>
                            </option>
                    <?php } ?>
                </select>
            </div>

            <div class="row form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar"/>
            </div>
        </form>
            
            
        <footer class="fixed-bottom text-white text-center bg-primary">
            Sunmarket &copy, 2019
        </footer>
            
        <script src="js/jquery.js"></script>
        <script src="./js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

<?php

require_once './banco/ProdutoDAO.php';
require_once './classes/Produto.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $idCategoria = $_POST['categoria'];
    
    $imagemTmp = $_FILES['arquivo']['tmp_name'];
    $destino = "./img/produtos/"
            .$idCategoria.$nome.$admin->getId().$_FILES['arquivo']['name'];
    
    
    if (!(new ProdutoDAO())->insertProduto(new Produto(0, $nome, $descricao,
            $destino, $preco, $quantidade, $idCategoria, $admin->getId()))) {
        echo "ERRO! Não foi possível inserir!";
    } else {
        move_uploaded_file($imagemTmp, $destino);
        header('Location: ./dashboard.php');
    }
}