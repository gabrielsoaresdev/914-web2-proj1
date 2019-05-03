<?php

require_once 'Conexao.php';
require_once '../914-web2-proj1/banco/ProdutoDAO.php';
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
        $data = date('Y-m-d');
        $insert = "INSERT INTO pedido (data_compra, status, id_cliente) values ('$data', '1', '$clienteId')";
        if (!$this->conexao->query($insert)) {
            return false;
        }
        
        $select = "SELECT id id_pedido FROM pedido WHERE id_cliente = $clienteId ORDER BY id_pedido DESC";
        $idPedido = mysqli_fetch_assoc($this->conexao->query($select));
        $idPedido = $idPedido['id_pedido'];
        
        $produtosCarrinho = $this->selectCarrinhoByCliente($clienteId);
        $produtoDAO = new ProdutoDAO();
        foreach($produtosCarrinho as $unit) {
            $produtoEstoque = $produtoDAO->selectProdutoById($unit->getIdProduto());
            if($unit->getQuantidade() > $produtoEstoque->getQuantidade()) {
                $unit->setQuantidade($produtoEstoque->getQuantidade());
                $produtoEstoque->setQuantidade(0);
            }
            else {
                $produtoEstoque->setQuantidade($produtoEstoque->getQuantidade() - $unit->getQuantidade());
            }
            
            if($unit->getQuantidade() > 0) {
                $produtoDAO->updateProdutoQNT($produtoEstoque);
                $insert = "INSERT INTO produto_comprado (quantidade, id_pedido, id_produto) VALUES("
                        .$unit->getQuantidade().", ".$idPedido.", ".$unit->getIdProduto().")";
                $this->conexao->query($insert);
                $this->removeProduto($unit->getId());
            }
        }
    }
    
    function updateStatusById($status, $id) {
        $update = "UPDATE pedido SET status=$status WHERE id = $id";
        return $this->conexao->query($update);
    }
}