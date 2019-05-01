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
}

if (array_key_exists("id", $_GET)) {
    $produto = (new ProdutoDAO())->selectProdutoById($_GET['id']);
} else {
    header('Location: ./index.php?erro=3');
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
                object-fit: cover;
                width: 100%;
            }
        </style>
        
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a href="./index.php"><img src="img/logo.svg"></a>
               
                <div class="float-left dropdown">
                    <button id="btn-ola" class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá <?php
                            echo $cliente->getNome();
                        ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Editar Perfil</a>
                        <a class="dropdown-item" href="script_deslogar.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid p-5">
            
            <div class="row">
                <div class="col-4 imagem">
                    <img class="objectImage" src="<?php echo $produto->getImagemUrl();?>">
                </div>

                <div class="col">
                    <div class="h4"><?php echo $produto->getNome();?></div>
                    <div class="text-justify"><?php echo $produto->getDescricao();?></div><br><br>
                    <div class="font-weight-bolder">Quantidade: <?php echo $produto->getQuantidade();?> unidades</div>
                    <div class="text-success">Preço: R$ <?php echo $produto->getPreco()?></div>
                    
                    <a class="btn btn-warning">Adicione já ao carrinho!</a>
                </div>
            </div>
        </div>
        
        <footer class="fixed-bottom text-white text-center">
            Sunmarket &copy, 2019
        </footer>
        
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>