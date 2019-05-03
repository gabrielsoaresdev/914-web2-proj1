<?php

require_once './banco/ProdutoClienteDAO.php';

$pedido_id = $_POST['pedido_id'];
$status = $_POST['status'];

(new ProdutoClienteDAO())->updateStatusById($status, $pedido_id);
header('Location: ./dashboard.php');