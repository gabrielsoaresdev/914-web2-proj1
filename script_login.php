<?php
require_once './banco/ClienteDAO.php';

$username = $_POST['login'];
$password = $_POST['senha'];

if($_POST['is_cliente']) {
    $clienteDAO = new ClienteDAO();
    if($clienteDAO->logar($username, $password)) {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['username'] = $username;
        header('Location: ./index.php');
    }
    else {
        header('Location: ./entrar.php?erro=1');
    }
}
else {
    //Logar como adm
}
