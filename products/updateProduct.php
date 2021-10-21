<?php
  include_once('../head.php');
  ?>

    <?php
      include_once('../php/connection.php');

      $id = $_POST["id"];
      $name = $_POST["nome_produto"];
      $cod = $_POST["cod_barras"];
      $value = $_POST["valor_unitario"];

      // echo $id;
      // echo $name;
      // echo $cod;
      // echo $value;

       $update = $connection->exec("UPDATE produto SET nome_produto='$name', cod_barras=$cod, valor_unitario='$value' WHERE id=$id");
       echo "<div class='container pt-5'>
                <p class='success'>Produto Atualizado com sucesso.</p>
                  <div class='col-12'>
                    <a href='/products/readProduct.php' class='btn btn-primary'>voltar</a>
                  </div>
              </div>";
    ?>

<?php
  include_once('../footer.php');
  ?>