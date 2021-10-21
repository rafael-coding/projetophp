<?php
  include_once('../head.php');
  ?>

<?php
  include_once('../php/connection.php');

  $getOrder = $connection->query('SELECT * FROM pedido WHERE numero_pedido=' . $_GET["numero_pedido"]);
    $dataOrder = $getOrder->fetchAll();
     print_r($dataOrder);
?>

<div class="container pt-5 d-flex justify-content-center">
    <div class="col-12 col-md-6 col-xl-4 mt-5">
        <form method="POST" action="./updateOrder.php" class="row g-3 text-white border border-primary py-5 px-2">
        <input type="hidden" name="numero_pedido" value="<?php echo $dataOrder[0]["numero_pedido"] ?>">
        <h4 class="pb-2 border-bottom text-white mt-0">Editar Pedido</h4>
            <div class="col-md-12 ">
              <label for="nome_cliente" class="form-label">Nome do Cliente:</label>
              <select class="form-control" name="nome_cliente" id="select-client">
                    <?php
                        include_once('../php/connection.php');

                        $clients = $connection->query('select * from cliente');

                        foreach($clients as $client){
                            $volverineCareca = $dataOrder[0]['id_cliente'] == $client['id'] ? "selected" : "";
                            echo '<option ' . $volverineCareca .'  value="' . $client['id'] .'">' . $client['nome_cliente'] . '</option>';
                        }
                    ?>
              </select>
            </div>

            <div class="col-md-12">
              <label for="cod_barras" class="form-label">Nome do Produto:</label>
              <select class="form-control" name="nome_produto" id="select-product" onchange="getUnitaryValue(event)">
                    <?php
                        include_once('../php/connection.php');

                        $products = $connection->query('select * from produto');

                        foreach($products as $product){
                            $phpDoFront = $dataOrder[0]['id_produto'] == $product['id'] ? "selected" : "";
                            echo '<option ' . $phpDoFront . ' value="' . $product['id'] . '">' .$product['nome_produto'] . '</option>';
                        }
                    ?>
              </select>
              <script>
                function getUnitaryValue(event) {
                    fetch(`../products/valueProduct.php?id=${event.target.value}`).then(
                        response => response.json()
                    ).then(
                        raw => document.getElementById('valor_unitario').value = raw['valor_unitario']
                    );
                }
            </script>
            </div>

            <div class="col-md-12">
              <label for="valor_unitario" class="form-label">Valor:</label>
              <input type="text" class="form-control" id="valor_unitario" placeholder="R$" name="valor_unitario" value="<?php echo $dataOrder[0]["valor_unitario"] ?>"  oninput="somar()"  autocomplete="off" readonly>
            </div>
            <div class="col-md-12">
              <label for="quantidade" class="form-label">Quantidade:</label>
              <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?php echo $dataOrder[0]["quantidade"] ?>"  oninput="somar()"  autocomplete="off" >
            </div>
            <div class="col-md-12">
              <label for="total" class="form-label">Total:</label>
              <input type="text" class="form-control" name="total" id="total" placeholder="R$" value="<?php echo $dataOrder[0]["total"] ?>" autocomplete="off" readonly>
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
              <a href="./readOrder.php" class="btn btn-primary">
                voltar
              </a>

              <button type="submit" id="btn-order" class="btn btn-primary">
                Editar  Pedido
              </button>
            </div>
        </form>
    </div>
</div>

<?php
  include_once('../footer.php');
  ?>