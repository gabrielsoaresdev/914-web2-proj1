<?php include 'cabecalho_admin.php' ?>
<div class="container-fluid">    
<div>
    <div class="card p-3" style="display: block;">
        <a href="./cadastro_produto.php" class="btn btn-primary">Add Produto</a>
        <a href="./cadastro_admin.php" class="btn btn-primary">Add Administrador</a>
        <a href="./cadastro_categoria.php" class="btn btn-primary">Add Categoria</a>
    </div>

    <div class="row">
        <div class="container-fluid">

        </div>

    </div>

</div>
        

<form class="row form-group" action="dashboard.php" method="GET">
    <?php
        $q = "";
        if(array_key_exists("q", $_GET)) {
            $q = $_GET['q'];
    ?>
    <a href="index.php" class="col-auto btn btn-white border-danger text-danger m-1">X - Voltar</a>
    <?php } ?>
    <input class="col form-control  m-1" type="number" name="q" placeholder="Busque por id..." value="<?php echo $q; ?>">
    <input onclick="" class="col-auto btn btn-warning  m-1" type="submit" value="Pesquisar">
</form>

        
<?php 

require_once 'banco/PedidoDAO.php';
require_once 'classes/Pedido.php';

$pedidoDAO = new PedidoDAO();
$pedidos = null;

if(array_key_exists("q", $_GET)) {
    $pedidos = $pedidoDAO->selectPedidosById($_GET['q']);
}
else {
    $pedidos = $pedidoDAO->selectAll();
}
?>
<table style="width: 100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Data da Compra (ANO/MES/DIA)</th>
        <th>Status do Pedido</th>
    </tr>
    </thead>
    
    <tbody>
<?php
if($pedidos <> null) {
    foreach($pedidos as $pedido) {
?>
    <tr>
        <td><?php echo $pedido->getId(); ?></td>
        <td><?php echo $pedido->getDataCompra();?></td>
        <td>
            <form method="POST" action="script_atualizar_status.php">
                <input hidden="" name="pedido_id" value="<?php echo $pedido->getId(); ?>">
                <select name="status">
                    <option value="1" <?php if($pedido->getStatus() == 1) { echo "selected"; } ?>>Encaminhando</option>
                    <option value="2" <?php if($pedido->getStatus() == 2) { echo "selected"; } ?>>Empacontando</option>
                    <option value="3" <?php if($pedido->getStatus() == 3) { echo "selected"; } ?>>Postado!</option>
                    <option value="4" <?php if($pedido->getStatus() == 4) { echo "selected"; } ?>>Compra concluída!</option>
                </select>
                <input type="submit" value="SALVAR ITEM">
            </form>
        </td>
    </tr>
    <?php 
    } ?>
    </tbody>
</table> 
    
<?php
}
else {
    echo "Nenhum pedido encontrado!";
} ?>

</div>
<?php
include 'rodape.php'; 
