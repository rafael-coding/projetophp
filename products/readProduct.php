
<?php
  include_once('../head.php');
  ?>


  <div class="container pt-5">
    <div class="d-flex my-5">
        <div class="col-6 text-center">
            <a href="/products/formCreateProduct.php" class="btn btn-primary" >cadastrar</a>
        </div>
        <div class="col-6 text-center">
            <a href="/index.php" class="btn btn-primary">voltar</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Deletar Cliente</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Tem certeza que deseja deletar este produto?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="button" id="_deletar_product" class="btn btn-primary">Deletar</button>
                </div>
              </div>
            </div>
         </div>

    <h2 class="pb-2 border-bottom text-white mb-5">PRODUTOS</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">Nome do produto</th>
              <th scope="col">Código de Barras</th>
              <th scope="col">Valor unitário</th>
              <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php
            include_once('../php/connection.php');

            $listProduct = $connection->query("select * from produto");

                foreach ($listProduct as $result) {
                    echo '
                    <tr>
                      <th scope="row">' . $result["nome_produto"] .' </th>
                      <td> ' .  $result["cod_barras"] . ' </td>
                      <td> R$ ' . $result["valor_unitario"] . ' </td>
                      <td> 
                      <a href="/products/forrmUpdateProduct.php?id=' . $result['id'] . '"><i class="bi bi-pencil-square text-white"></i></a>
                      <a class="delete_product" data-id="' . $result['id'] . '" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash-fill text-white"></i></a>
                      </td>
                    </tr>
                    ';
                }
          ?>
        </tbody>
    </table>
  </div>

 <?php
  include_once('../footer.php');
  ?>