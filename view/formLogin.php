<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="login.php" method="post" autocomplete="on">

    <fieldset>
        <legend>Login</legend>

            <label for="iiemail">Email:</label>
            <input type="email" name="email" id="iemail" autocomplete="email">
        </p>

        <p>
            <label for="iisenha">Senha:</label>
            <input type="password" name="senha" id="isenha" autocomplete="current-password">
        </p>
        <p>
            <input type="submit" value="Entrar">
            <input type="reset" value="Limpar">
        </p>


    </fieldset>

    </form>
</body>
</html>