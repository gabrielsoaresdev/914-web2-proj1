<?php
    require_once '../banco/UsuarioDAO.php';
    require_once '../classes/Usuario.php';
        
    session_start();
    if(!$_SESSION['logado'] || !$_SESSION['is_admin'])
        header('location: ../entrar.php?erro=2');
    else
        $admin = (new UsuarioDAO())->selectUsuarioByUsername($_SESSION['username']);
?>