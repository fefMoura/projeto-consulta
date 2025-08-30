<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Produtos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .menu button {
            width: 200px;
            padding: 15px;
            margin: 15px 0;
            font-size: 1.1em;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .cadastrar {
            background-color: #2575fc;
            color: #fff;
        }

        .consultar {
            background-color: #6a11cb;
            color: #fff;
        }

        .cadastrar:hover {
            background-color: #1a5edb;
        }

        .consultar:hover {
            background-color: #5300a0;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>Menu de Produtos</h1>
        <form action="formCadastroProduto.php" method="get">
            <button type="submit" class="cadastrar">Cadastrar Produto</button>
        </form>
        <form action="consultarProdutos.php" method="get">
            <button type="submit" class="consultar">Consultar Produtos</button>
        </form>
    </div>
</body>
</html>
