<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <title>Administrador - Supermarket.com</title>
    </head>
    <body class="bg-primary">
        
        <div class="container">
            <div class="row">
                <div id="logo" class="col-sm mx-3 text-center">
                    <img src="img/logo.svg"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm mx-3 text-white text-center">
                    <h4>Vários produtos esperando por você!</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm card m-3">
                    <h3>Faça login do administrador!</h3>
                    <form id="form_login" action="banco/login_adm.php" method="POST" enctype="">
                        <div class="form-group">
                            <input class="form-control" type="text" name="login" placeholder="nome_de_usuario" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="senha" placeholder="Digite a senha aqui..." required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Entrar"/>
                            <a href="login.php" class="btn btn-link">Voltar!</a>
                        </div>
                    </form>
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