<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "consultaprodutos"; // coloque o nome correto do seu DB

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    die("Falha ao conectar ao MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}   

$mysqli->set_charset("utf8");
?>
