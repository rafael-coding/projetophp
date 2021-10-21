<?php
  include_once('../head.php');
  ?>


<?php
  include_once('../php/connection.php');

  $getClient = $connection->query('SELECT * FROM cliente WHERE id=' . $_GET["id"]);
    $dataClient = $getClient->fetchAll();
     //print_r($dataClient);
?>
<div class="container pt-5 d-flex justify-content-center">
    <div class="col-12 col-md-6 col-xl-4 mt-5">
        <form method="POST" action="./updateClient.php" class="row g-3 text-white border border-primary py-5 px-2">
        <h4 class="pb-2 border-bottom text-white mt-0">Editar Cliente</h4>
            <div class="col-md-12 ">
              <label for="nome_cliente" class="form-label">NOME:</label>
              <input type="hidden" name="id" value="<?php echo $dataClient[0]["id"] ?>">
              <input type="text" id="name-client" class="form-control" name="nome_cliente" value="<?php echo $dataClient[0]["nome_cliente"] ?>" autocomplete="off">
            </div>

            <div class="col-md-12">
              <label for="cpf" class="form-label">CPF:</label>
              <input type="text" id="cpf-client" class="form-control" name="cpf" value="<?php echo $dataClient[0]["cpf"] ?>" autocomplete="off">
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">Email:</label>
              <input type="email" id="email-client" class="form-control" name="email" value="<?php echo $dataClient[0]["email"] ?>" autocomplete="off" >
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
              <a href="./readClient.php" class="btn btn-primary">
                voltar
              </a>

              <button type="submit" id="btn-client" class="btn btn-primary">
                Atualizar Cliente
              </button>
            </div>
        </form>
    </div>
</div>

<?php
  include_once('../footer.php');
  ?>