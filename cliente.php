<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="theme.css">
    <script src="https://kit.fontawesome.com/407f74df21.js" crossorigin="anonymous"></script>
    <title>Página - Clientes</title>
</head>

<body>

    <header class="header">
        <span>=</span>
        <h1>Crud</h1>
    </header>
    <nav class="menu-side">
        <div class="container-nav">
            <a href="./index.html">Home</a>
        </div>
        <div class="container-nav">
            <a href="./clientes.php">Cliente</a>
        </div>
        <div class="container-nav">
            <a href="./produtos.php">Produto</a>
        </div>
        <div class="container-nav">
            <a href="./pedidos.php">Pedido</a>
        </div>
        <div class="container-nav">
            <a href="./migration-data">Migrar dados</a>
        </div>
    </nav>

    <div class="tabela-bg">
        <div class="header-table">
            <h4>Cliente</h4>
            <h4>CPF</h4>
            <h4>Email</h4>
        </div>
    </div>

    <?php

    $hostname = 'localhost';
    $newDatabaseName = 'php_crud_structured';
    $user = 'root';
    $pass = '';

    $connection;

    try {
        // Conexão com o novo banco
        $newDatabaseConn = new PDO("mysql:host=$hostname;dbname=$newDatabaseName", $user, $pass);
        $newDatabaseConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Testando conexão com o novo banco
        $newTable = $newDatabaseConn->query("select * from cliente");
        foreach ($newTable as $result) {
            echo '
            <div class="row-tabela">
                <div class="item-bela">
                    <p class="nome">' . $result["nome_cliente"] . '</p>
                    <p class="cpf">' . $result["cpf"] . '</p>
                    <p class="email">' . $result["email"] . '</p>
                </div>
            </div>
            ';
        }
    } catch (PDOException $e) {
        echo "Deu ruim maluco";
        echo $e->getMessage();
    } finally {
        $oldDatabaseConn = null;
        $newDatabaseConn = null;
    }

    echo "
    
    ";

    ?>
</body>
</html>