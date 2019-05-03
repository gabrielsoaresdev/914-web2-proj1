<?php
require_once './banco/UsuarioDAO.php';
require_once './banco/ProdutoDAO.php';
require_once './classes/Produto.php';
require_once './classes/Usuario.php';


session_start();
if (!$_SESSION['logado']) {
    header('location: ./entrar.php');
} else {
    $cliente = (new UsuarioDAO())->selectUsuarioByUsername($_SESSION['username']);
    if($cliente->isAdmin())
        header('location: ./dashboard.php');
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
        <title>Cadastre-se</title>
        
        <style>
            .objectImage {
                width: 90%;
                object-fit: cover;
                object-position: center;
            }
            .produto {
                width: 20%;
                display: inline-block;
            }
            .produto:hover {
                background: lightgray;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a href="index.php"><img src="img/logo.svg"></a>
               
                <div class="float-left dropdown">
                    <button id="btn-ola" class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá <?php
                            echo $cliente->getNome();
                        ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="carrinho.php">Carrinho</a>
                        <a class="dropdown-item" href="pedidos.php">Pedidos</a>
                        <a class="dropdown-item" href="script_deslogar.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container p-3">
            <form class="row form-group" action="index.php" method="GET">
                <?php
                    if(array_key_exists("q", $_GET) || array_key_exists("id_cat", $_GET)) {
                ?>
                <a href="index.php" class="col-auto btn btn-white border-danger text-danger m-1">X - Voltar</a>
                <?php
                    }

                    $q = "";
                    if(array_key_exists("q", $_GET)) {
                        $q = $_GET['q'];
                    }
                ?>
                
                <input class="col form-control  m-1" type="text" name="q" value="<?php echo $q; ?>" placeholder="Busque aqui...">
                <?php 
                    $nameFormInput = "";
                    if(array_key_exists("id_cat", $_GET)) {
                ?>
                <input name="id_cat" value="<?php echo $_GET['id_cat']; ?>" hidden="">
                <?php
                    }
                ?>
                <input onclick="" class="col-auto btn btn-warning  m-1" type="submit" value="Pesquisar">
            </form>
            
            <div class="row">
                <?php
                    require_once './banco/CategoriaDAO.php';
                    require_once './classes/Categoria.php';
                
                    $categorias = (new CategoriaDAO())->selectAll();
                    if($categorias <> null) {
                        foreach ($categorias as $categoria) {
                ?>
                
                <?php
                            $class = "btn-warning";
                            $id_cat = "?id_cat=" . $categoria->getId() . "&q=$q";
                            if(array_key_exists("id_cat", $_GET)) {
                                if($_GET['id_cat'] == $categoria->getId()) {
                                    $class = "btn-white text-warning";
                                    $id_cat = "?q=$q";
                                }
                            }
                ?>
                
                <a class="col-auto btn m-1 <?php echo $class; ?>" onclick="" href="index.php<?php echo $id_cat;?>">
                    <?php echo $categoria->getNome();?>
                </a>
                <?php }
                    }?>
            </div>
            <?php
            
                $produtoDAO = new ProdutoDAO();
                $produtos = "void";
                if(array_key_exists("q", $_GET) && array_key_exists("id_cat", $_GET)) {
                    if ($_GET['q'] <> "" || $_GET['id_cat'] <> "") {
                        $produtos = $produtoDAO->findProdutosByCategoriaAndNome($_GET['id_cat'], $_GET['q']);
                    }
                }
                else if(array_key_exists("q", $_GET)) {                    
                    if ($_GET['q'] <> "") {
                        $produtos = $produtoDAO->findProdutosByNome($_GET['q']);
                    }
                } 
                else if(array_key_exists("id_cat", $_GET)) {
                    if ($_GET['id_cat'] <> "") {
                        $produtos = $produtoDAO->findProdutosByCategoria($_GET['id_cat']);
                    }
                }
                if($produtos == "void") {
                    $produtos = $produtoDAO->selectAll();
                }
                
                if($produtos == null) { ?>
                <div class="text-warning">
                    Nenhum produto encontrado! Contate o administrador para 
                    adicionar o produto em questão
                </div>
                <?php
                }
                else {
                    foreach($produtos as $produto) {
            ?>
            <div onclick="location.replace('produto.php?id=<?php echo $produto->getId(); ?>')" class="card container produto m-1">
                <div class="imagem">
                    <img class="objectImage" src="<?php echo $produto->getImagemUrl(); ?>">
                </div>
                <div class="row h5"><?php echo $produto->getNome();?></div>
                <div class="row h6 font-weight-bold text-success">R$ <?php echo $produto->getPreco(); ?></div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
        
        <footer class="fixed-bottom text-white text-center">
            Sunmarket &copy, 2019
        </footer>
        
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>