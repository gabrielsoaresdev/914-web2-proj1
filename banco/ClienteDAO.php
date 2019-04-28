<?php
require_once '/Cliente.php';
require_once 'Conexao.php';

class ClienteDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
    function selectClienteByUsername($username) : Cliente {
        $select = "SELECT * FROM clientes WHERE username = '$username'";
        $result = $this->conexao->query(select);
        if($result) {
            $result = mysqli_fetch_assoc($result);
            $id = $result['id'];
            $nome = $result['nome'];
            $cpf = $result['cpf'];
            $email = $result['email'];
            $password = $result['password'];
            return new Cliente($id, $nome, $cpf, $email, $username, $password);
        }
    }
    
    function logar($username, $password) : bool {
        $cliente = $this->selectClienteByUsername($username);
        if($cliente != null) {
            session_start();
            $_SESSION['$username'] = $cliente->compararPassword($password);
            return true;
        }
        return false;
    }
    
    function insertCliente(Cliente $cliente) {
        $insert = "INSERT INTO clientes (nome, cpf, email, username, password) "
            . "values ('".$cliente->getNome()."', '".$cliente->getCpf()."',"
            . " '".$cliente->getEmail()."', '".$cliente->getUsername()."',"
            . " '".$cliente->getPassword()."')";
        
        return $conexao->query($insert);
    }
    
    function updateCliente(Cliente $cliente) {
        $update = "UPDATE clientes SET nome='".$cliente->getNome()."', "
            . "SET cpf='".$cliente->getCpf()."', email='".$cliente->getEmail()."', "
            . "username='".$cliente->getUsername()."', password='".$cliente->getPassword()."', "
            . "WHERE id=" . $cliente->getId();
        
        return $conexao->query($update);
    }
    
}

