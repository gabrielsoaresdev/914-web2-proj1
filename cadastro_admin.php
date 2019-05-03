<?php include 'cabecalho_admin.php' ?>
        
<form class="container py-3" action="cadastro_admin.php" method="POST">
    <div class="col-sm card m-3 text-danger">
        O usuário inserido terá privilégios de Administrador!
    </div>

    <div class="form-group">
        <label for="username">Digite o username:</label><br>
        <input class="form-control" type="text" name="username" placeholder="Coloque o seu username aqui..." required="">
    </div>

    <div class="form-group">
        <label for="senha">Digite a senha:</label><br>
        <input type="password" class="form-control" name="password" placeholder="Digite a senha aqui..." required="">
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
    </div>
</form>

        
<?php include 'rodape.php' ?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!(new UsuarioDAO())->insertUsuario(
            new Usuario(0, $nome, $cpf, $email, $username, $password, true))) {
        echo "ERRO! Não foi possível inserir! Talvez um usuário com esses dados esteja cadastrado.";
    } else {
        header('Location: ./dashboard.php');
    }
}