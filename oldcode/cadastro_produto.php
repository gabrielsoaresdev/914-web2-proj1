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
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <a href=""><img src="img/logo.svg"></a>

                <div class="float-left dropdown">
                    <button id="btn-ola" class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Olá <?php echo "Gabriel!"?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Editar Perfil</a>
                        <a class="dropdown-item" href="#">Sair</a>
                    </div>
                </div>
            </div>
        </nav>

        <form class="container my-5 py-5">
          <h3> Cadastrar Produto </h3>
            <div class="form-group">
                <label for="username">Digite seu nome:</label><br>
                <input class="form-control" type="text" name="nome" placeholder="Coloque o seu nome aqui..." required="">
            </div>

            <div class="form-group">
                <label for="senha">Digite sua descrição:</label><br>
                <input type="descricao" class="form-control" name="descricao" placeholder="Digite sua descrição aqui..." required="">
            </div>


            <div class="custom-file">
            <input type="file" class="custom-file-input" name="imagem" id="validatedCustomFile" required>
            <label class="custom-file-label" for="imagem">Adicione sua imagem aqui...</label>
          </div>

            <div class="form-group">
                <label for="nome">Digite o preço:</label><br>
                <input type="number" class="form-control" name="preco" placeholder="Digite o preco aqui..." required="">
            </div>

            <div class="form-group">
                <label for="nome">Digite a quantidade:</label><br>
                <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade aqui..." required="">
            </div>

            <div class="form-group">
                <label for="nome">Selecione sua categoria:</label><br>
                  <select name="categoria" class="form-control">
                    <option value="eletronicos">Eletrônicos</option>
                    <option value="mesa">Mesa</option>
                    <option value="banho">Banho</option>
                    <option value="comida">Comida</option>
                  </select>
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