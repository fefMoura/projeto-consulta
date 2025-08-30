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
    <title>Formulário</title>

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
            width: 340px;
        }

        fieldset {
            border: none;
        }

        legend {
            font-size: 1.4em;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 0.95em;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 6px rgba(37,117,252,0.4);
        }

        a {
            font-size: 0.9em;
            color: #2575fc;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            text-decoration: underline;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 10px;
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

        
        .botoes {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .links {
            display: flex;
            justify-content: space-between; 
            margin-bottom: 15px;
        }

        .links a {
            font-size: 0.9em;
            color: #2575fc;
            text-decoration: none;
            transition: 0.3s;
        }

        .links a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <form action="../controller/processaLogin.php" method="post" autocomplete="on">
        <fieldset>
            <legend>Login</legend>

            <label for="iemail">Email:</label>
            <input type="email" name="email" id="iemail" autocomplete="email" placeholder="Digite seu email"  required> 

            <label for="isenha">Senha:</label>
            <input type="password" name="senha" id="isenha" autocomplete="current-password" placeholder="Digite sua senha" required>

            <p class="links">
                <a href="#">Esqueceu sua senha?</a>
                <a href="formCadastro.php">Criar conta</a>
            </p>

            <div class="botoes">
                <input type="submit" value="Entrar">
                <input type="reset" value="Limpar">
            </div>
        </fieldset>
    </form>
</body>
</html>
