<?php

include("conexao.php");
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $repSenha = $_POST['repSenha'];

    // Verifica se as senhas conferem
    if ($senha !== $repSenha) {
        echo "<script>alert('As senhas não conferem!'); history.back();</script>";
        exit();
    }

    // Verifica se o e-mail já existe
    $check = $mysqli->prepare("SELECT idusuario FROM usuario WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email já cadastrado!'); history.back();</script>";
        exit();
    }

    // Cria hash da senha
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere no banco
    $sql = "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $nome, $sobrenome, $email, $hash);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../view/formLogin.php';</script>";
        exit();
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); history.back();</script>";
        exit();
    }
}
?>
