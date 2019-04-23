<?php

class Conexao {
    
    private $conexao;
    
    function __construct() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "loja";
    
        $this->conexao = mysqli_connect($host, $user, $password, $database);
    }
    
    function query($query) {
        return mysqli_query($this->conexao, $query);
    }
}