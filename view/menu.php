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
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            text-align: center;
            width: 320px;
        }

        h1 {
            margin-bottom: 40px;
            color: #333;
            font-size: 1.8em;
            letter-spacing: 1px;
        }

        .menu form {
            margin-bottom: 20px;
        }

        .menu button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            font-size: 1.1em;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        /* Gradiente nos botões */
        .cadastrar {
            background: linear-gradient(135deg, #2575fc, #1a5edb);
            color: #fff;
        }

        .consultar {
            background: linear-gradient(135deg, #6a11cb, #5300a0);
            color: #fff;
        }

        /* Hover com movimento e sombra */
        .menu button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
        }

        /* Adicionar foco visual */
        .menu button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37,117,252,0.5);
        }

        /* Responsividade */
        @media screen and (max-width: 400px) {
            .menu {
                width: 90%;
                padding: 40px 20px;
            }

            h1 {
                font-size: 1.5em;
            }

            .menu button {
                padding: 12px;
                font-size: 1em;
            }
        }
        #logout{
            margin: 0px;
            padding: 0px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="menu">
        <p id="logout"><a href="../controller/logout.php">Logout</a></p>
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
