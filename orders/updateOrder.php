<?php
  include_once('../head.php');
  ?>

  <?php
  
    include_once('../php/connection.php');

      if ($_POST) {
        $np = $_POST['numero_pedido'] ?? null;
        $client = $_POST['nome_cliente'] ?? null;
        $product = $_POST['nome_produto'] ?? null;
        $value = $_POST['valor_unitario'] ?? null;
        $quantity = $_POST['quantidade'] ?? null;
        $total = $_POST['total'] ?? null;

        // echo $np . '<br>';
        // echo $client . '<br>';
        // echo $product . '<br>';
        // echo $value . '<br>';
        // echo $quantity . '<br>';
        // echo $total . '<br>';


      
        $connection->exec("UPDATE pedido SET id_cliente='$client', id_produto='$product', valor_unitario='$value', quantidade='$quantity', total='$total' WHERE numero_pedido=$np");
        unset($connection);
        echo "<div class='container pt-5'>
                <p class='success'>Pedido Atualizado com sucesso.</p>
                  <div class='col-12'>
                    <a href='/orders/readOrder.php' class='btn btn-primary'>voltar</a>
                  </div>
              </div>";
      }
    ?>

<?php
  include_once('../footer.php');
  ?>