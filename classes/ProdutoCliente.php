<?php

abstract class ProdutoCliente {
    private $id;
    private $quantidade;
    private $idProduto;
    
    function __construct($id, $quantidade, $idProduto) {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->idProduto = $idProduto;
    }

    function getId() {
        return $this->id;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }
}

class ProdutoComprado extends ProdutoCliente {
    private $idPedido;
    private $dataCompra;
    private $status;
    
    function __construct($id, $quantidade, $idProduto, $idPedido, $dataCompra, $status) {
        parent::__construct($id, $quantidade, $idProduto);
        $this->dataCompra = $dataCompra;
        $this->status = $status;
        $this->idPedido = $idPedido;
    }

    function getDataCompra() {
        return $this->dataCompra;
    }

    function setDataCompra($dataCompra) {
        $this->dataCompra = $dataCompra;
    }
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    function getIdPedido() {
        return $this->idPedido;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }
}

class ProdutoCarrinho extends ProdutoCliente {
    private $idCliente;
    
    function __construct($id, $quantidade, $idProduto, $idCliente) {
        parent::__construct($id, $quantidade, $idProduto);
        $this->idCliente = $idCliente;
    }
    
    function getIdCliente() {
        return $this->idCliente;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
}