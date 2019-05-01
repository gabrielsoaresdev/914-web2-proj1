<?php

require_once 'Conexao.php';
require_once '../914-web2-proj1/classes/Produto.php';

class ProdutoDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
//    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
//    nome VARCHAR(120),
//    descricao TEXT,
//    imagem_url VARCHAR(300),
//    preco DECIMAL(7,2),
//    quantidade INT,
//    categoria INT,
//    id_adm INT,
//    FOREIGN KEY (id_adm) REFERENCES usuarios(id)
    
    function selectAll() {
        $select = "SELECT * FROM PRODUTOS ORDER BY nome";
        
        $result = $this->conexao->query($select);
        $produtos[];
        
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new Produto($row['id'], $row['nome'], $row['descricao'],
                    $row['imagem_url'], $row['preco'], $row['quantidade'],
                    $row['id_categoria'], $row['id_adm']);
        }
        print_r($produtos);
        return $produtos;
    }
    
    function insertProduto(Produto $produto) {
        $insert = "INSERT INTO produtos (nome, descricao, imagem_url, preco,"
            ." quantidade, id_categoria, id_adm) values ('".$produto->getNome()."', "
            .$produto->getDescricao()."', '".$produto->getImagemUrl()."', '"
            .$produto->getPreco()."', '".$produto->getQuantidade()."', '"
            .$produto->getIdCategoria()."', '".$produto->getIdAdm()."')";
        return $this->conexao->query($insert);
    }
}