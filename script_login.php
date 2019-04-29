<?php
require_once './banco/UsuarioDAO.php';

$username = $_POST['login'];
$password = $_POST['senha'];

$usuarioDAO = new UsuarioDAO();
if($usuarioDAO->logar($username, $password)) {
    
    if(!$_SESSION['is_admin']) 
        header('Location: ./index.php');
    else
        header('Location: ./admin/dashboard.php');
}
else {
    header('Location: ./entrar.php?erro=1');
}