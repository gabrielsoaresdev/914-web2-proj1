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
                <a href=""><img src="img/logo.svg"></a>
               
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
        
        <div class="container p-3">
            <form class="row form-group">
                <input class="col form-control" type="text" placeholder="Busque aqui...">
                <input class="col-auto btn btn-warning" type="submit" value="Pesquisar"></button>
            </form>
            <?php
                $produtos = (new ProdutoDAO())->selectAll();
                
                foreach($produtos as $produto) {
                    echo "<div onclick=\"location.replace('produto.php?id=".$produto->getId()
                        ."')\" class=\"card container produto m-1\"><div class=\"imagem\">"
                        ."<img class=\"objectImage\" src=\"".$produto->getImagemUrl()."\">"
                        ."</div><div class=\"row h5\">".$produto->getNome()."</div>"
                        ."<div class=\"row h6 font-weight-bold text-success\">R$ ".
                        $produto->getPreco()."</div></div>";
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