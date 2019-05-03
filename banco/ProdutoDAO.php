<?php

require_once 'Conexao.php';
require_once '../914-web2-proj1/classes/Produto.php';

class ProdutoDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
    function selectAll() {
        $select = "SELECT * FROM PRODUTOS ORDER BY nome";
        $produtos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new Produto($row['id'], $row['nome'], $row['descricao'],
                    $row['imagem_url'], $row['preco'], $row['quantidade'],
                    $row['id_categoria'], $row['id_adm']);
        }
        return $produtos;
    }
    
    function selectProdutosByAdminId($adminId) {
        $select = "SELECT * FROM PRODUTOS WHERE id_admin="
                .$adminId."ORDER BY nome";
        
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new Produto($row['id'], $row['nome'], $row['descricao'],
                    $row['imagem_url'], $row['preco'], $row['quantidade'],
                    $row['id_categoria'], $row['id_adm']);
        }
        return $produtos;
    }
    
    function selectProdutoById($id) {
        $select = "SELECT * FROM PRODUTOS WHERE id=".$id;
        
        $result = mysqli_fetch_assoc($this->conexao->query($select));
        $produto = new Produto($result['id'], $result['nome'], $result['descricao'],
            $result['imagem_url'], $result['preco'], $result['quantidade'],
            $result['id_categoria'], $result['id_adm']);
        
        return $produto;
    }
    
    function findProdutosByNome($termoDeBusca) {
        $select = "SELECT * FROM PRODUTOS WHERE nome like '%".$termoDeBusca."%'";
        $produtos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new Produto($row['id'], $row['nome'], $row['descricao'],
                    $row['imagem_url'], $row['preco'], $row['quantidade'],
                    $row['id_categoria'], $row['id_adm']);
        }
        return $produtos;
    }
    
    function findProdutosByCategoria($idCategoria) {
        $select = "SELECT * FROM PRODUTOS WHERE id_categoria = ".$idCategoria;
        $produtos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new Produto($row['id'], $row['nome'], $row['descricao'],
                    $row['imagem_url'], $row['preco'], $row['quantidade'],
                    $row['id_categoria'], $row['id_adm']);
        }
        return $produtos;
    }
    
    function findProdutosByCategoriaAndNome($idCategoria, $termoDeBusca) {
        $select = "SELECT * FROM PRODUTOS WHERE nome like '%".$termoDeBusca."%' "
                . "and id_categoria=" . $idCategoria;
        $produtos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new Produto($row['id'], $row['nome'], $row['descricao'],
                    $row['imagem_url'], $row['preco'], $row['quantidade'],
                    $row['id_categoria'], $row['id_adm']);
        }
        return $produtos;
    }
    
    function insertProduto(Produto $produto) {
        $insert = "INSERT INTO produtos (nome, descricao, imagem_url, preco,"
            ." quantidade, id_categoria, id_adm) values ('".$produto->getNome()."', '"
            .$produto->getDescricao()."', '".$produto->getImagemUrl()."', '"
            .$produto->getPreco()."', '".$produto->getQuantidade()."', '"
            .$produto->getIdCategoria()."', '".$produto->getIdAdm()."')";
        
        return $this->conexao->query($insert);
    }
}