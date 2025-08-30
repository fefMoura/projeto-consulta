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
    <title>Formulario</title>
</head>
<body>
<form action="../controller/processaLogin.php" method="post" autocomplete="on">
    <fieldset>
        <legend>Login</legend>

        <p>
            <label for="iemail">Email:</label>
            <input type="email" name="email" id="iemail" autocomplete="email" 
                  value="<?= $_POST['email'] ?? '' ?>"
>
        </p>

        <p>
            <label for="isenha">Senha:</label>
            <input type="password" name="senha" id="isenha" autocomplete="current-password">
        </p>

        <p>
            <a href="esquecisenha.php">Esqueceu sua senha?</a>
        </p>

        <p>
            <input type="submit" value="Entrar">
            <input type="reset" value="Limpar">
        </p>
    </fieldset>
</form>
</body>
</html>
