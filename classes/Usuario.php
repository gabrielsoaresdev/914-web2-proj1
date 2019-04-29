<?php
    
class Usuario {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $username;
    private $password;
    private $isAdmin;
    
    function __construct($id, $nome, $cpf, $email, $username, $password, $isAdmin) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
    }

    function compararPassword($password) : bool{
        return $password == $this->password;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }
    
    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($oldPassword, $newPassword) {
        if ($oldPassword == $this->password) {
            $this->password = $newPassword;
            return true;
        } else {
            return false;
        }
    }
    
    function isAdmin() {
        return $this->isAdmin;
    }

    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }
}