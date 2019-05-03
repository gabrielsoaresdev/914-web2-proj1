<?php

class Pedido {
    private $id;
    private $dataCompra;
    private $status;
    private $idCliente;
    
    function __construct($id, $dataCompra, $status, $idCliente) {
        $this->id = $id;
        $this->dataCompra = $dataCompra;
        $this->status = $status;
        $this->idCliente = $idCliente;
    }
    
    function getId() {
        return $this->id;
    }

    function getDataCompra() {
        return $this->dataCompra;
    }

    function getStatus() {
        return $this->status;
    }

    function getIdCliente() {
        return $this->idCliente;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDataCompra($dataCompra) {
        $this->dataCompra = $dataCompra;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
}