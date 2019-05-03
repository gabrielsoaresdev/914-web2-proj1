<?php

require_once '../914-web2-proj1/classes/Categoria.php';
require_once 'Conexao.php';

class CategoriaDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
    function selectAll() {
        $select = "SELECT * FROM categorias ORDER BY nome";
        $result = $this->conexao->query($select);
        $categorias = null;
        
        while($row = mysqli_fetch_assoc($result)) {
            $categorias[] = new Categoria($row['id'], $row['nome']);
        }
        return $categorias;
    }
    
    function insertCategoria(Categoria $categoria) {
        $insert = "INSERT INTO categorias (nome) VALUES ('".$categoria->getNome()."')";
        return $this->conexao->query($insert);
    }
}
