<?php
include("../model/modelProduto.php");
include("../controller/produtoService.php");
include("../controller/conexao.php"); // $mysqli do MySQLi

// Cria serviço
$service = new ProdutoService($mysqli);

// Consulta todos os produtos
$produtos = $service->consultarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            width: 90%;
            max-width: 1000px;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 1.8em;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            transition: 0.3s;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
            font-size: 0.95em;
            transition: 0.3s;
        }

        th {
            background: linear-gradient(135deg, #2575fc, #1a5edb);
            color: #fff;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef4ff;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 6px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
        }

        #voltar {
            margin: 0 0 20px 0;
            text-align: right;
        }

        /* Botão Voltar Estilizado com gradiente e animação */
        .btn-voltar {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #2575fc, #1a5edb);
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.4s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .btn-voltar:hover {
            background: linear-gradient(135deg, #1a5edb, #1253a2);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        /* Responsividade */
        @media screen and (max-width: 700px) {
            th, td {
                font-size: 0.85em;
                padding: 8px;
            }

            img {
                max-width: 70px;
                max-height: 70px;
            }

            .container {
                padding: 30px 20px;
            }
        }

        @media screen and (max-width: 500px) {
            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <p id="voltar"><a href="menu.php" class="btn-voltar">Voltar</a></p>
        <h1>Produtos Cadastrados</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Data de Validade</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p->codigo) ?></td>
                    <td><?= htmlspecialchars($p->produto) ?></td>
                    <td><?= htmlspecialchars($p->data_validade) ?></td>
                    <td>R$ <?= number_format($p->preco, 2, ',', '.') ?></td>
                    <td>
                        <?php if ($p->imagem): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($p->imagem) ?>" alt="<?= htmlspecialchars($p->produto) ?>">
                        <?php else: ?>
                            Sem imagem
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
