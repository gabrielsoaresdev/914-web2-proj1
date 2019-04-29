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
                        <a class="dropdown-item" href="#">Editar Perfil</a>
                        <a class="dropdown-item" href="script_deslogar.php">Sair</a>
                    </div>
                </div>
            </div>
        </nav>
            
        <form class="container py-3">
            <div class="row">
                <div class="col-sm card text-danger">
                    A pessoa que você irá cadastrar terá privilégios de administrador!
                </div>
            </div>
                
       
            <h3 class="row"> Cadastrar Produto </h3>
            <div class="row form-group">
                <input class="form-control" type="text" name="nome" placeholder="Coloque o seu nome aqui..." required="">
            </div>

            <div class="row form-group">
                <input type="descricao" class="form-control" name="descricao" placeholder="Digite sua descrição aqui..." required="">
            </div>

            <div class="row form-group custom-file">
                <input type="file" class="custom-file-input" name="imagem" id="validatedCustomFile" required>
                <label class="custom-file-label" for="imagem">Adicione sua imagem aqui...</label>
            </div>

            <div class="row form-group">
                <input type="number" class="form-control" name="preco" placeholder="Digite o preco aqui..." required="">
            </div>

            <div class="row form-group">
                <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade aqui..." required="">
            </div>

            <div class="row form-group">
                <label for="nome">Selecione a categoria:</label><br>
                <select name="categoria" class="form-control">
                    <option value="eletronicos">Eletrônicos</option>
                    <option value="cama">Cama</option>
                    <option value="mesa">Mesa</option>
                    <option value="banho">Banho</option>
                    <option value="outros">Outros</option>
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