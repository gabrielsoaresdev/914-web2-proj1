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
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <a href="index.php"><img src="img/logo.svg"></a>
            </div>
        </nav>
        
        <form class="container my-5 py-5" action="banco/cadastra_cliente.php" method="POST">
            <div class="form-group">
                <label for="username">Digite o username:</label><br>
                <input class="form-control" type="text" name="username" placeholder="Coloque o seu username aqui..." required="">
            </div>

            <div class="form-group">
                <label for="senha">Digite a senha:</label><br>
                <input type="password" class="form-control" name="senha" placeholder="Digite a senha aqui..." required="">
            </div>

            <div class="form-group">
                <label for="cpf">Digite o cpf (somente números):</label><br>
                <input type="number" class="form-control" name="cpf" placeholder="Digite o cpf aqui..." required="">
            </div>
            
            <div class="form-group">
                <label for="email">Digite email:</label><br>
                <input type="email" class="form-control" name="email" placeholder="Digite o email aqui..." required="">
            </div>

            <div class="form-group">
                <label for="nome">Digite o seu nome:</label><br>
                <input type="text" class="form-control" name="nome" placeholder="Digite a seu nome aqui..." required="">
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar"/>
                <a href="login.php" class="btn btn-link">Já é cadastrado? Faça login!</a>
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
