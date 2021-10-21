<?php
  include_once('../head.php');
  ?>

    <?php
      include_once('../php/connection.php');

      $id = $_POST["id"];
      $name = $_POST["nome_cliente"];
      $cpf = $_POST["cpf"];
      $email = $_POST["email"];

      // echo $id;
      // echo $name;
      // echo $cpf;
      // echo $email;

       $update = $connection->exec("UPDATE cliente SET nome_cliente='$name', cpf='$cpf', email='$email' WHERE id=$id");

       echo "<div class='container pt-5'>
                <p class='success'>Cliente Atualizado com sucesso.</p>
                  <div class='col-12'>
                    <a href='/client/readClient.php' class='btn btn-primary'>voltar</a>
                  </div>
              </div>";

    ?>

<?php
  include_once('../footer.php');
  ?>