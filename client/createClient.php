<?php
  include_once('../head.php');
  ?>

  <?php
  
    include_once('../php/connection.php');

      if ($_POST) {
        $name = $_POST['nome_cliente'] ?? null;
        $cpf = $_POST['cpf'] ?? null;
        $email = $_POST['email'] ?? null;
      
        $connection->exec("INSERT INTO cliente VALUES (DEFAULT, '$name', '$cpf', '$email')");
        unset($connection);
        echo "<div class='container pt-5'>
                <p class='success'>$name foi inserido com sucesso.</p>
                  <div class='col-12'>
                    <a href='/client/readClient.php' class='btn btn-primary'>voltar</a>
                  </div>
              </div>";
      }
    ?>

<?php
  include_once('../footer.php');
  ?>