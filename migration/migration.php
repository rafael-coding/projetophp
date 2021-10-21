<?php
  include_once('../head.php');
  ?>

    <?php

        $hostname = 'localhost';
        $oldDatabaseName = 'php_migration_old';
        $newDatabaseName = 'php_crud_structured';
        $user = 'root';
        $password = "";

        try{
            //Database antigo
            $oldConnection = new PDO("mysql:host=$hostname;dbname=$oldDatabaseName", $user, $password);
            $oldConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Database novo
            $newConnection = new PDO("mysql:host=$hostname;dbname=$newDatabaseName", $user, $password);
            $newConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $oldRegister = $oldConnection->query("SELECT * FROM pedido");

            foreach ($oldRegister as $register) {
                $insertClient = $newConnection->prepare('INSERT cliente VALUES (DEFAULT, :nome_cliente, :cpf, :email) ');
                $insertClient->execute([
                    ':nome_cliente' => $register['nome_cliente'],
                    ':cpf' => $register['cpf'],
                    ':email' => $register['email']
                ]);

                $insertProduct = $newConnection->prepare('INSERT produto VALUES (DEFAULT, :nome_produto, :valor_unitario, :cod_barras)');
                $insertProduct->execute([
                    ':nome_produto' => $register['nome_produto'],
                    ':valor_unitario' => $register['valor_unitario'],
                    ':cod_barras' => $register['cod_barras']

                ]);

            }
            
        } catch (PDOException $error) {
            // echo $error->getMessage();
        }
        try{

             //Database antigo
             $oldConnection = new PDO("mysql:host=$hostname;dbname=$oldDatabaseName", $user, $password);
             $oldConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
             //Database novo
             $newConnection = new PDO("mysql:host=$hostname;dbname=$newDatabaseName", $user, $password);
             $newConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
             $oldRegister = $oldConnection->query("SELECT * FROM pedido");

             foreach ($oldRegister as $register) {
                $insertOrder = $newConnection->prepare(
                    'INSERT pedido VALUES (:numero_pedido, :data_pedido, :id_cliente, :id_produto, :valor_unitario, :quantidade, :total)');

                    $resultQuery = $newConnection->query("SELECT id FROM cliente WHERE cpf = " . $register["cpf"]);
                    $idClient;
                    foreach ($resultQuery as $result) {
                        $idClient = $result['id'];
                    }

                    $resultQuery = $newConnection->query("SELECT id FROM produto WHERE cod_barras = " . $register["cod_barras"]);
                    $idProduct;
                    foreach ($resultQuery as $result) {
                        $idProduct = $result['id'];
                    }

                    $insertOrder->execute([
                        ":numero_pedido" => $register['numero_pedido'],
                        ":data_pedido" => $register['dt_pedido'],
                        ":id_cliente" => $idClient,
                        ":id_produto" => $idProduct,
                        ":valor_unitario" => $register['valor_unitario'],
                        ":quantidade" => $register['quantidade'],
                        ":total" =>  $register['valor_unitario'] * $register['quantidade']
                    ]);
            }
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';

                unset($connection);
                echo "<div class='container pt-5'>
                        <p class='success'>Migração realizada com sucesso!</p>
                    </div>";

                $page = $protocol . $_SERVER["HTTP_HOST"] . "/index.php";
                header("Refresh:2; $page");

        } catch (PDOException $error) {
            $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';

            unset($connection);
            echo "<div class='container pt-5'>
                    <p class='success'>Migração falhou, chamar o fofão da formosa!</p>
                </div>";

            $page = $protocol . $_SERVER["HTTP_HOST"] . "/index.php";
            header("Refresh:5; $page");
        }
    ?>

<?php
  include_once('../footer.php');
  ?>