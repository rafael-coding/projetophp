<?php
  include_once('../head.php');
  ?>

  <?php
  
    include_once('../php/connection.php');

      if ($_POST) {
        $client = $_POST['nome_cliente'] ?? null;
        $product = $_POST['nome_produto'] ?? null;
        $value = $_POST['valor_unitario'] ?? null;
        $quantity = $_POST['quantidade'] ?? null;
        $total = $_POST['total'] ?? null;

        // echo $client . '<br>';
        // echo $product . '<br>';
        // echo $value . '<br>';
        // echo $quantity . '<br>';
        // echo $total . '<br>';


      
        $connection->exec("INSERT INTO pedido VALUES (DEFAULT,  NOW(), '$client', '$product', '$value', '$quantity', '$total')");
        unset($connection);
        echo "<div class='container pt-5'>
                <p class='success'>O pedido foi registrado com sucesso.</p>
                  <div class='col-12'>
                    <a href='/orders/readOrder.php' class='btn btn-primary'>voltar</a>
                  </div>
              </div>";
      }
    ?>

<?php
  include_once('../footer.php');
  ?>