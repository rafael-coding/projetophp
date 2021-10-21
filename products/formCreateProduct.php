<?php
  include_once('../head.php');
  ?>

<div class="container pt-5 d-flex justify-content-center">
    <div class="col-12 col-md-6 col-xl-4 mt-5">
        <form method="POST" action="./createProduct.php" class="row g-3 text-white border border-primary py-5 px-2">
        <h4 class="pb-2 border-bottom text-white mt-0">Cadastrar Produto</h4>
            <div class="col-md-12 ">
              <label for="nome_cliente" class="form-label">Nome:</label>
              <input type="text" id="product-name" class="form-control" name="nome_produto" value="" autocomplete="off" required>
            </div>

            <div class="col-md-12">
              <label for="cpf" class="form-label">Código de Barras:</label>
              <input type="text" id="cod" class="form-control" name="cod_barras" value="" autocomplete="off" required>
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">Valor R$:</label>
              <input type="text" id="uni-valor" class="form-control" name="valor_unitario" value="" autocomplete="off" >
            </div>
            <div class="col-12 d-flex justify-content-between mt-4">
              <a href="./readProduct.php" class="btn btn-primary">
                voltar
              </a>

              <button type="submit" id="btn-product" class="btn btn-primary">
                Cadastrar Produto
              </button>
            </div>
        </form>
    </div>
</div>

<?php
  include_once('../footer.php');
  ?>