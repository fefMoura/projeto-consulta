<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="../controller/processaCadastro.php" method="post" autocomplete="on">

    <fieldset>
        <legend>Cadastro</legend>

        <p>
            <label for="inome">Nome:</label>
            <input type="text" name="nome" id="inome" autocomplete="name" >
        </p>

        <p>
            <label for="isobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="isobrenome" autocomplete="family-name">
        </p>

        <p>
            <label for="iiemail">Email:</label>
            <input type="email" name="email" id="iemail" autocomplete="email">
        </p>

        <p>
            <label for="iisenha">Senha:</label>
            <input type="password" name="senha" id="isenha" autocomplete="new-password">
        </p>

        <p>
            <label for="iisenha">Repetir senha:</label>
            <input type="password" name="repSenha" id="irepSenha">
        </p>
        <p>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </p>
      

    </fieldset>

    </form>
</body>
</html>