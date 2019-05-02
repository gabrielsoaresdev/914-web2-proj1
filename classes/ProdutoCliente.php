<?php

abstract class ProdutoCliente {
    private $id;
    private $quantidade;
    private $idCliente;
    private $idProduto;
    
    function __construct($id, $quantidade, $idCliente, $idProduto) {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->idCliente = $idCliente;
        $this->idProduto = $idProduto;
    }

    function getId() {
        return $this->id;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getIdCliente() {
        return $this->idCliente;
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

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }
}

class ProdutoComprado extends ProdutoCliente {
    private $dataCompra;
    
    function __construct($id, $quantidade, $idCliente, $idProduto, $dataCompra) {
        parent::__construct($id, $quantidade, $idCliente, $idProduto);
        $this->dataCompra = $dataCompra;
    }

    function getDataCompra() {
        return $this->dataCompra;
    }

    function setDataCompra($dataCompra) {
        $this->dataCompra = $dataCompra;
    }
}

class ProdutoCarrinho extends ProdutoCliente {
    
}

