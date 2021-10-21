  <?php
  include_once('head.php');
  ?>

    <div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom text-white">PDV</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 text-white">
      <div class="col d-flex align-items-start">
        <div class="col-12 text-center">
          <h2 class="mb-0">Clientes</h2>
          <div class="col-12 text-center my-5">
          <i class="bi bi-people-fill text-white display-1"></i>
          </div>
          <a href="./client/readClient.php" class="btn btn-primary">
            Clientes
          </a>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="col-12 text-center">
          <h2 class="mb-0">Produtos</h2>
          <div class="col-12 text-center my-5">
          <i class="bi bi-box-seam text-white display-1"></i>
          </div>
          <a href="./products/readProduct.php" class="btn btn-primary">
            Produtos
          </a>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="col-12 text-center">
          <h2 class="mb-0">Pedidos</h2>
          <div class="col-12 text-center my-5">
          <i class="bi bi-cart-check-fill text-white display-1"></i>
          </div>
          <a href="./orders/readOrder.php" class="btn btn-primary">
            Pedidos
          </a>
        </div>
      </div>


      <div class="col d-flex align-items-start">
        <div class="col-12 text-center">
          <h2 class="mb-0">Migração</h2>
          <div class="col-12 text-center my-5">
          <i class="bi bi-diagram-3 text-white display-1"></i>
          </div>
          <a href="#" id="migration" class="btn btn-primary">
            Migração
          </a>
        </div>
      </div>
      
    </div>
  </div>

  <?php
  include_once('footer.php');
  ?>