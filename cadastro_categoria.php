<?php
    require_once './banco/UsuarioDAO.php';
    require_once './classes/Usuario.php';
        
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
        <title>Cadastre-se</title>
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
                        <a class="dropdown-item" href="#">Editar Perfil</a>
                        <a class="dropdown-item" href="script_deslogar.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <form class="container py-3" action="cadastro_categoria.php" method="POST">
            <?php
                if(array_key_exists("erro", $_GET)) {
                    if($_GET['erro'] == 1) { ?>
                        <div class="row">
                            <div class="col-sm card m-3 text-danger">
                                "Você precisa primeiro adicionar uma categoria!
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
            <div class="form-group">
                <label for="nome">Digite o nome da nova categoria:</label><br>
                <input class="form-control" type="text" name="nome" required="">
            </div>
            
            <div class="form-group">
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

require_once './banco/CategoriaDAO.php';
require_once './classes/Categoria.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    if (!(new CategoriaDAO())->insertCategoria(new Categoria(0, $nome))) {
        echo "ERRO! Não foi possível inserir!";
    } else {
        header('Location: ./dashboard.php');
    }
}