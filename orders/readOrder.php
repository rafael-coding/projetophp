
<?php
  include_once('../head.php');
  ?>


  <div class="container pt-5">
    <div class="d-flex my-5">
        <div class="col-6 text-center">
            <a href="/orders/formCreateOrder.php" class="btn btn-primary" >cadastrar</a>
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
                  <button type="button" id="_deletar_order" class="btn btn-primary">Deletar</button>
                </div>
              </div>
            </div>
         </div>

    <h2 class="pb-2 border-bottom text-white mb-5">PEDIDOS</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">Número do pedido</th>
              <th scope="col">Data da compra</th>
              <th scope="col">Cliente</th>
              <th scope="col">Produto</th>
              <th scope="col">Valor unitário</th>
              <th scope="col">quantidade</th>
              <th scope="col">total</th>
              <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php
            include_once('../php/connection.php');

            function formatterDate($date)
            {
                $formattedDate = date('d-m-Y', strtotime($date));
                $formattedDate = str_replace("-", "/", $formattedDate);
                return $formattedDate;
            }

            $listOrder = $connection->query('
                SELECT p.numero_pedido, p.data_pedido, c.nome_cliente, pr.nome_produto, p.quantidade, pr.valor_unitario, p.total
                FROM pedido p
                JOIN cliente c ON p.id_cliente = c.id
                JOIN produto pr ON p.id_produto = pr.id;
            ');

                foreach ($listOrder as $result) {
                    echo '
                    <tr>
                      <th scope="row">' . $result["numero_pedido"] .' </th>
                      <td> ' .  formatterDate($result["data_pedido"]) . ' </td>
                      <td> ' . $result["nome_cliente"] . ' </td>
                      <td> ' . $result["nome_produto"] . ' </td>
                      <td> R$ ' . $result["valor_unitario"] . ' </td>
                      <td> ' . $result["quantidade"] . 'x </td>
                      <td> R$ ' . $result["total"] . ' </td>
                      <td> 
                      <a href="/orders/formUpdateOrder.php?numero_pedido=' . $result['numero_pedido'] . '"><i class="bi bi-pencil-square text-white"></i></a>
                      <a class="delete_order" data-id="' . $result['numero_pedido'] . '" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash-fill text-white"></i></a>
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