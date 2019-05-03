<?php 
include 'cabecalho.php'; 

require_once './banco/PedidoDAO.php';
require_once './classes/Pedido.php';
?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    
</style>

<h6>Seus pedidos</h6>
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
$pedidos = (new PedidoDAO())->selectPedidosByCliente($cliente->getId());
foreach($pedidos as $pedido) {
?>

    <tr>
        <td><?php echo $pedido->getId(); ?></td>
        <td><?php echo $pedido->getDataCompra();?></td>
        <?php
            $status = "";
            switch($pedido->getStatus()) {
                case 1:
                    $status = "Encaminhando";
                    break;
                case 2:
                    $status = "Empacontando";
                    break;
                case 3:
                    $status = "Postado!";
                    break;
                case 4:
                    $status = "Compra concluída!";
            }
        ?>
        <td><?php echo $status;?></td>
    </tr>
<?php 
} ?>
    </tbody>
</table>

<?php include 'rodape.php'; 