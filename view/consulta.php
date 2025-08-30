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
    <title>Lista de Produtos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
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
</body>
</html>
