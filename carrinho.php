<?php
require_once './banco/ProdutoDAO.php';
require_once './classes/Produto.php';
require_once './classes/ProdutoCliente.php';
require_once './banco/ProdutoClienteDAO.php';

include 'cabecalho.php';
?>
<style>
    .objectImage {
        width: 90%;
        object-fit: cover;
        object-position: center;
    }
    .produto {
        width: 20%;
        display: inline-block;
    }
    .produto:hover {
        background: lightgray;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<a id="btn-comprar" href="script_comprar.php?id_cliente=<?php echo $cliente->getId(); ?>" class="m-3 text-white bottom float-left btn btn-success">
    COMPRAR!
</a>
<div class="container p-3">
    
    <?php
        $produtosCarrinho = (new ProdutoClienteDAO())
                ->selectCarrinhoByCliente($cliente->getId());

        $produtoDAO = new ProdutoDAO();
        if($produtosCarrinho == null) {
            echo "Nenhum ítem no carrinho! :-/";
    ?>
    <script>document.getElementById("btn-comprar").style.visibility = "hidden";</script>
    <?php
        } else {
            foreach($produtosCarrinho as $unit) {
                $produto = $produtoDAO->selectProdutoById($unit->getIdProduto());
    ?>

    <div onclick="location.replace('produto.php?id=<?php echo $produto->getId(); ?>')" class="row card produto m-1">
        <div class="col-auto imagem">
            <img class="objectImage" src="<?php echo $produto->getImagemUrl(); ?>">
        </div>
        <div class="col">
            <div class="h5"><?php echo $produto->getNome();?></div>
            <div class="h6 font-weight-bold text-success">R$ <?php echo $produto->getPreco(); ?></div>
        </div>
        <div class="col-auto">
            Quant. <?php echo $unit->getQuantidade(); ?>
        </div>
        <a href="script_remove_carrinho.php?id=<?php echo $unit->getId(); ?>" class="col btn btn-danger">Remover</a>
    </div>

    <?php
            }
        }
    ?>
</div>


<?php include './rodape.php'; ?>