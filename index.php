<?php

$hostname = 'localhost';
$database = 'php_migration_old';
$newDatabaseName = 'php_crud_structured';
$user = 'root';
$pass = '';

$connection;

try {
    // Conexão com o banco antigo
    $connection = new PDO("mysql:host=$hostname;dbname=$database", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Conexão com o novo banco
    $newDatabaseConn = new PDO("mysql:host=$hostname;dbname=$newDatabaseName", $user, $pass);
    $newDatabaseConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultado = $connection->query("select * from pedido");
    foreach ($resultado as $register) {
        // Inserindo dado
        $queryInsert = $newDatabaseConn->prepare("INSERT INTO cliente (nome_cliente, cpf, email) VALUES (:nome, :cpf, :email)");
        $queryInsert->execute(array(
            ":nome" => $register["nome_cliente"],
            ":cpf" => $register["cpf"],
            ":email" => $register["email"]
        ));
    }

     // Testando conexão com o novo banco
     $newTable = $newDatabaseConn->query("select * from cliente");
     echo "<pre>";
     foreach ($newTable as $result) {
        print_r($result);
    }
    echo "</pre>";

} catch (PDOException $e) {
    echo "Deu ruim maluco";
    echo $e->getMessage();
} finally {
    $oldDatabaseConn = null;
    $newDatabaseConn = null;
}
