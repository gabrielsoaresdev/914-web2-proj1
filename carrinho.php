<?php
require_once './banco/UsuarioDAO.php';
require_once './banco/ProdutoDAO.php';
require_once './classes/Produto.php';
require_once './classes/Usuario.php';
require_once './classes/ProdutoCliente.php';
require_once './banco/ProdutoClienteDAO.php';


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
                        <a class="dropdown-item" href="index.php">Página Inicial</a>
                        <a class="dropdown-item" href="script_deslogar.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container p-3">
            <?php
                $produtosCarrinho = (new ProdutoClienteDAO())
                        ->selectCarrinhoByCliente($cliente->getId());
                
                $produtoDAO = new ProdutoDAO();
                if($produtosCarrinho == null) {
                    echo "Nenhum ítem no carrinho! :-/";
                } else {
                    foreach($produtosCarrinho as $unit) {
                        $produto = $produtoDAO->selectProdutoById($unit->getIdProduto());
            ?>
             
            <div onclick="location.replace('produto.php?id=<?php echo $produto->getId(); ?>')" class="row card produto m-1">
                <div class="col-auto imagem">
                    <img class="objectImage" src="<?php echo $produto->getImagemUrl(); ?>">
                </div>
                <div class="col">
                    <div class="h5"><?php echo $produto->getNome();?></div>
                    <div class="h6 font-weight-bold text-success">R$ <?php echo $produto->getPreco(); ?></div>
                </div>
                <div class="col-auto">
                    Quant. <?php echo $unit->getQuantidade(); ?>
                </div>
                <a href="script_remove_carrinho.php?id=<?php echo $unit->getId(); ?>" class="col btn btn-danger">Remover</a>
            </div>
            
            <?php
                    }
                }
            ?>
        </div>
        
        <a class="fixed-bottom float-left btn btn-success">
            COMPRAR!
        </a>
        
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>