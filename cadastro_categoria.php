<?php include 'cabecalho_admin.php' ?>
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

<?php include 'rodape.php' ?>
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