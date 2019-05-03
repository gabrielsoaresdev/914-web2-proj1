<?php

require_once 'Conexao.php';
require_once '../914-web2-proj1/classes/ProdutoCliente.php';

class ProdutoClienteDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
    function selectCarrinhoByCliente($clienteId) {
        $select = "SELECT * FROM produto_do_carrinho WHERE id_cliente = $clienteId";
        
        $produtos = null;
        
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $produtos[] = new ProdutoCarrinho($row['id'], $row['quantidade'], $row['id_produto'], $row['id_cliente']);
        }
        return $produtos;
    }
    
    function removeProduto($id) {
        $select = "DELETE FROM produto_do_carrinho WHERE id = $id";
        
        return $this->conexao->query($select);
    }
    
    function addProdutoToCarrinho(ProdutoCarrinho $produtoCarrinho) {
        $insert = "INSERT INTO produto_do_carrinho (quantidade, id_produto, id_cliente) "
                . "VALUES ('".$produtoCarrinho->getQuantidade()."', "
                .$produtoCarrinho->getIdProduto().", ".$produtoCarrinho->getIdCliente().")";
        return $this->conexao->query($insert);
    }
    
    function comprarCarrinho($clienteId) {
        
    }
    
}