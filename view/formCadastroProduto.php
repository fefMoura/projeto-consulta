<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <form action="../controller/cadastrarProduto.php" method="post" autocomplete="on" enctype="multipart/form-data">

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
