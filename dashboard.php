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
                <a href="#">
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
        
        <div>
            <div class="card p-3" style="display: block;">
                <a href="./cadastro_produto.php" class="btn btn-primary">Add Produto</a>
                <a href="./cadastro_admin.php" class="btn btn-primary">Add Administrador</a>
            </div>
            
            <div class="row">
                <div class="container-fluid">
                    <div class="row"></div>
                    
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