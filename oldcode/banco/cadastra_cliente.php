<?php 

require_once 'conexao.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$username = $_POST['username'];
$senha = $_POST['senha'];

$insert = "INSERT INTO clientes (nome, cpf, email, username, password) "
        . "values ('$nome', '$cpf', '$email', '$username', '$senha')";

if((new Conexao())->query($insert))
    header('location: ../login.php');
else
    echo "Não foi possível cadastrar o cliente!";