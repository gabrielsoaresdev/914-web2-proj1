<?php

require_once 'banco/ProdutoClienteDAO.php';
require_once 'classes/ProdutoCliente.php';

$idCliente = $_POST['id_cliente'];
$quantidade = $_POST['quantidade'];
$idProduto = $_POST['id_produto'];

(new ProdutoClienteDAO())->addProdutoToCarrinho(
        new ProdutoCarrinho(0, $quantidade, $idProduto, $idCliente));
header('Location: ./carrinho.php');