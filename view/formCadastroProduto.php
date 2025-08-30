<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>

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

        form {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            width: 420px;
        }

        fieldset {
            border: none;
        }

        legend {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 0.95em;
            margin-bottom: 6px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 6px rgba(37,117,252,0.4);
        }

        /* Personalizar input file */
        input[type="file"] {
            padding: 6px;
            background: #f9f9f9;
            cursor: pointer;
        }

        input[type="file"]:hover {
            background: #eef4ff;
            border-color: #2575fc;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 12px;
            font-size: 1em;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"] {
            background-color: #2575fc;
            color: #fff;
        }

        input[type="reset"] {
            background-color: #e0e0e0;
            color: #333;
        }

        input[type="submit"]:hover {
            background-color: #1a5edb;
        }

        input[type="reset"]:hover {
            background-color: #ccc;
        }

        /* Alinhar botões lado a lado */
        .botoes {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        #voltar {
            margin: 0px 0 15px 0;
            text-align: right;
        }

        /* Botão Voltar Estilizado */
        .btn-voltar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2575fc;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-voltar:hover {
            background-color: #1a5edb;
            box-shadow: 0 6px 12px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>
    <form action="../controller/cadastrarProduto.php" method="post" autocomplete="on" enctype="multipart/form-data">
        <p id="voltar"><a href="menu.php" class="btn-voltar">Voltar</a></p>

        <fieldset>
            <legend>Cadastro de Produto</legend>

            <label for="icodigo">Código:</label>
            <input type="text" name="codigo" id="icodigo" placeholder="Digite o código do produto" required>

            <label for="inome">Nome do Produto:</label>
            <input type="text" name="produto" id="iproduto" placeholder="Digite o nome do produto" required>

            <label for="ivalidade">Data de Validade:</label>
            <input type="date" name="data_validade" id="idata_validade" required>

            <label for="ipreco">Preço:</label>
            <input type="number" step="0.01" name="preco" id="ipreco" placeholder="Digite o preço do produto" required>

            <label for="iimagem">Imagem do Produto:</label>
            <input type="file" name="imagem" id="iimagem" accept="image/*" required>

            <div class="botoes">
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </div>
        </fieldset>
    </form>
</body>
</html>
