<?php
    include_once('../php/connection.php');

    $np = $_GET['numero_pedido'] ?? 'falha no erro, chamar o wolverine careca';

    // echo $np;
    if ($np != -1) {
        $connection->exec('DELETE FROM pedido WHERE numero_pedido=' . $np);
        unset($connection);
    }

?>

<script>
    window.open(document.referrer, '_self');
</script>