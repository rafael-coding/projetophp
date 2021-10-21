<?php
  include_once('../head.php');
  ?>

  <?php
  
    include_once('../php/connection.php');

      if ($_POST) {
        $name = $_POST['nome_produto'] ?? null;
        $value = $_POST['valor_unitario'] ?? null;
        $cod = $_POST['cod_barras'] ?? null;
      
        $connection->exec("INSERT INTO produto VALUES (DEFAULT, '$name', '$value', '$cod')");
        unset($connection);
        echo "<div class='container pt-5'>
                <p class='success'>$name cadastrado com sucesso.</p>
                  <div class='col-12'>
                    <a href='/products/readProduct.php' class='btn btn-primary'>voltar</a>
                  </div>
              </div>";
      }
    ?>

<?php
  include_once('../footer.php');
  ?>