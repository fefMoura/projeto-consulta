<?php
include("conexao.php");
include "conexao.php";

// Inicia a sessão no topo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["email"])) {

    $email = $mysqli->real_escape_string($_POST["email"]);

    // Prepara e executa a query
    $sql_code = "SELECT idusuario, senha FROM usuario WHERE email = ?";
    $stmt = $mysqli->prepare($sql_code);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $dado = $result->fetch_assoc();

    // Validação
    if (!$dado) {
        echo "<script>alert('Este email não pertence a nenhum usuário.'); history.back();</script>";
        exit();
    } 

    if (!password_verify($_POST['senha'], $dado['senha'])) {
        echo "<script>alert('Senha incorreta.'); history.back();</script>";
        exit();
    }

    // Login bem-sucedido
    $_SESSION['usuario'] = $dado['idusuario'];
    $_SESSION['email'] = $email;
    echo "<script>alert('Login efetuado com sucesso!'); window.location.href='sucesso.php';</script>";
    exit();
}
?>
