<?php
  include_once('../head.php');
  ?>


<?php
  include_once('../php/connection.php');

  $getClient = $connection->query('SELECT * FROM produto WHERE id=' . $_GET["id"]);
    $dataClient = $getClient->fetchAll();
     //print_r($dataClient);
?>
<div class="container pt-5 d-flex justify-content-center">
    <div class="col-12 col-md-6 col-xl-4 mt-5">
        <form method="POST" action="./updateProduct.php" class="row g-3 text-white border border-primary py-5 px-2">
        <h4 class="pb-2 border-bottom text-white mt-0">Editar Produto</h4>
            <div class="col-md-12 ">
              <label class="form-label">Nome:</label>
              <input type="hidden" name="id" value="<?php echo $dataClient[0]["id"] ?>">
              <input type="text" id="product-name" class="form-control" name="nome_produto" value="<?php echo $dataClient[0]["nome_produto"] ?>" autocomplete="off" required>
            </div>

            <div class="col-md-12">
              <label class="form-label">Código de Barras:</label>
              <input type="text" id="cod" class="form-control" name="cod_barras" value="<?php echo $dataClient[0]["cod_barras"] ?>" autocomplete="off" required>
            </div>

            <div class="col-md-12">
              <label class="form-label">Valor:</label>
              <input type="text" id="uni-valor" class="form-control" name="valor_unitario" value="<?php echo $dataClient[0]["valor_unitario"] ?>" autocomplete="off" >
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
              <a href="./readProduct.php" class="btn btn-primary">
                voltar
              </a>

              <button type="submit" id="btn-product" class="btn btn-primary">
                Atualizar Produto
              </button>
            </div>
        </form>
    </div>
</div>

<?php
  include_once('../footer.php');
  ?>