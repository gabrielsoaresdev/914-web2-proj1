<?php

require_once 'banco/ProdutoClienteDAO.php';
require_once 'classes/ProdutoCliente.php';

$id = $_GET['id'];

(new ProdutoClienteDAO())->removeProduto($id);

header('Location: ./carrinho.php');