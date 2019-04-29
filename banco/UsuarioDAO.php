<?php
require_once '../914-web2-proj1/classes/Usuario.php';
require_once 'Conexao.php';

class UsuarioDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
    function selectUsuarioByUsername($username) : Usuario {
        $select = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $this->conexao->query($select);
        if($result) {
            $result = mysqli_fetch_assoc($result);
            $id = $result['id'];
            $nome = $result['nome'];
            $cpf = $result['cpf'];
            $email = $result['email'];
            $password = $result['password'];
            $isAdmin = $result['is_admin'];
            return new Usuario($id, $nome, $cpf, $email, $username, $password, $isAdmin);
        }
    }
    
    function logar($username, $password) : bool {
        $usuario = $this->selectUsuarioByUsername($username);
        if($usuario <> null) {
            if($usuario->compararPassword($password)) {
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = $usuario->isAdmin();
                return true;
            }
        }
        return false;
    }
    
    function insertUsuario(Usuario $usuario) {
        $insert = "INSERT INTO usuarios (nome, cpf, email, username, password, is_admin) "
            . "values ('".$usuario->getNome()."', '".$usuario->getCpf()."',"
            . " '".$usuario->getEmail()."', '".$usuario->getUsername()."',"
            . " '".$usuario->getPassword()."', '"
            .($usuario->isAdmin() ? 1 : 0)."')";
        
        return $this->conexao->query($insert);
    }
    
    function updateUsuario(Usuario $usuario) {
        $update = "UPDATE usuarios SET nome='".$usuario->getNome()."', "
            . "SET cpf='".$usuario->getCpf()."', email='".$usuario->getEmail()."', "
            . "username='".$usuario->getUsername()."', password='".$usuario->getPassword()."', "
            . "WHERE id=" . $usuario->getId();
        
        return $this->conexao->query($update);
    }
    
}