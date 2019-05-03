<?php

require_once 'banco/ProdutoClienteDAO.php';

$idCliente = $_GET['id_cliente'];

(new ProdutoClienteDAO())->comprarCarrinho($idCliente);
header('location: pedidos.php');