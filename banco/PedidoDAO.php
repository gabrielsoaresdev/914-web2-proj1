<?php

require_once '../914-web2-proj1/classes/Pedido.php';
require_once 'Conexao.php';

class PedidoDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new Conexao();
    }
    
    function selectAll() {
        $select = "SELECT * FROM pedido ORDER BY status";
        
        $pedidos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $pedidos[] = new Pedido($row['id'], $row['data_compra'], $row['status'], $row['id_cliente']);
        }
        return $pedidos;
    }
    
    function selectPedidosById($id) {
        $select = "SELECT * FROM pedido WHERE id=$id ORDER BY status DESC";
        
        $pedidos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $pedidos[] = new Pedido($row['id'], $row['data_compra'], $row['status'], $row['id_cliente']);
        }
        return $pedidos;
    }
    
    function selectPedidosByCliente($idCliente) {
        $select = "SELECT * FROM pedido WHERE id_cliente=$idCliente ORDER BY id DESC";
        
        $pedidos = null;
        $result = $this->conexao->query($select);
        while($row = mysqli_fetch_assoc($result)) {
            $pedidos[] = new Pedido($row['id'], $row['data_compra'], $row['status'], $row['id_cliente']);
        }
        return $pedidos;
    }
}