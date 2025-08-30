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
            width: 380px;
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

        input[type="text"],
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

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 6px rgba(37,117,252,0.4);
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

        /* Alinhar botões lado a lado */
        .botoes {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
          .links {
            justify-content: space-between; 
            margin-bottom: 15px;
            text-align: right;
        }
    </style>
</head>
<body>
    <form action="../controller/processaCadastro.php" method="post" autocomplete="on">
        <fieldset>
            <legend>Cadastro</legend>

            <label for="inome">Nome:</label>
            <input type="text" name="nome" id="inome" autocomplete="name" placeholder="Digite seu nome" required>

            <label for="isobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="isobrenome" autocomplete="family-name" placeholder="Digite seu sobrenome" required>

            <label for="iemail">Email:</label>
            <input type="email" name="email" id="iemail" autocomplete="email" placeholder="Digite seu email" required>

            <label for="isenha">Senha:</label>
            <input type="password" name="senha" id="isenha" autocomplete="new-password" placeholder="Digite sua senha" required>

            <label for="irepSenha">Repetir senha:</label>
            <input type="password" name="repSenha" id="irepSenha" placeholder="Repita sua senha" required>

            <p class="links">
                <a href="formLogin.php">Fazer Login</a>
            </p>

            <div class="botoes">
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </div>
        </fieldset>
    </form>
</body>
</html>
