<?php

include("conexao.php");
include "conexao.php";
include("../model/model.php");

$user = new User(
    null,
    $_POST['nome'],
    $_POST['sobrenome'],
    $_POST['email'],
    $_POST['senha']
);

    // Verifica se as senhas conferem
   if ($_POST['senha'] !== $_POST['repSenha']) {
    echo "<script>alert('As senhas não conferem!'); history.back();</script>";
    exit();
}

    // Verifica se o e-mail já existe
   $check = $mysqli->prepare("SELECT idusuario FROM usuario WHERE email = ?");
$check->bind_param("s", $user->email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Email já cadastrado!'); history.back();</script>";
    exit();
}


    // Cria hash da senha
    $user->senha = password_hash($user->senha, PASSWORD_DEFAULT);

    // Insere no banco
   $sql = "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $user->nome, $user->sobrenome, $user->email, $user->senha);

if ($stmt->execute()) {
    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../view/formLogin.php';</script>";
    exit();
} else {
    echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); history.back();</script>";
    exit();
}


?>
