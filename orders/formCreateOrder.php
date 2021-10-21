<?php
  include_once('../head.php');
  ?>

<div class="container pt-5 d-flex justify-content-center">
    <div class="col-12 col-md-6 col-xl-4 mt-5">
        <form method="POST" action="./createOrder.php" class="row g-3 text-white border border-primary py-5 px-2">
        <h4 class="pb-2 border-bottom text-white mt-0">Cadastrar Pedido</h4>
            <div class="col-md-12 ">
              <label for="nome_cliente" class="form-label">Nome do Cliente:</label>
              <select class="form-control" name="nome_cliente" id="select-client">
                <option value="Selecione">Selecione</option>
                    <?php
                        include_once('../php/connection.php');

                        $clients = $connection->query('select * from cliente');

                        foreach($clients as $client){
                            echo '<option value="' .$client['id'] .'">' .$client['nome_cliente'] . '</option>';
                        }
                    ?>
              </select>
            </div>

            <div class="col-md-12">
              <label for="cod_barras" class="form-label">Nome do Produto:</label>
              <select class="form-control" name="nome_produto" id="select-product" onchange="getUnitaryValue(event)">
              <option value="Selecione">Selecione</option>
                    <?php
                        include_once('../php/connection.php');

                        $products = $connection->query('select * from produto');

                        foreach($products as $product){
                            echo '<option value="' .$product['id'] .'">' .$product['nome_produto'] . '</option>';
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
              <input type="text" class="form-control" id="valor_unitario" placeholder="R$" name="valor_unitario" value=""  oninput="somar()"  autocomplete="off" readonly>
            </div>
            <div class="col-md-12">
              <label for="quantidade" class="form-label">Quantidade:</label>
              <input type="text" class="form-control" id="quantidade" name="quantidade" value=""  oninput="somar()"  autocomplete="off" >
            </div>
            <div class="col-md-12">
              <label for="total" class="form-label">Total:</label>
              <input type="text" class="form-control" name="total" id="total" placeholder="R$" value="" autocomplete="off" readonly>
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
              <a href="./readOrder.php" class="btn btn-primary">
                voltar
              </a>

              <button type="submit" id="btn-order" class="btn btn-primary">
                Cadastrar Pedido
              </button>
            </div>
        </form>
    </div>
</div>

<?php
  include_once('../footer.php');
  ?>