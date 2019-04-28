<?php
require_once './banco/ClienteDAO.php';

$username = $_POST['login'];
$password = $_POST['senha'];

$clienteDAO = new ClienteDAO();
if($clienteDAO->logar($username, $password)) {
    session_start();
    $_SESSION['logado'] = true;
    header('index.php');
}
else {
    header('Location: ../login.php?erro=1');
}

