<?php

include_once('../php/connection.php');

$query = $connection->prepare("SELECT valor_unitario FROM produto WHERE id = :id");
$query->execute([
    ':id' => $_GET['id'],
]);
echo json_encode($query->fetch());