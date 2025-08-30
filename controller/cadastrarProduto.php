<?php
include("../model/modelProduto.php");
include("produtoService.php");
include("conexao.php"); // $conn do MySQLi

// Recebe dados do formulário
$codigo = $_POST["codigo"];
$produto = $_POST['produto'];
$data_validade = $_POST['data_validade'];
$preco = $_POST['preco'];

// Recebe o arquivo da imagem
$imagem = file_get_contents($_FILES['imagem']['tmp_name']);

// Cria o objeto Produto
$p = new Produto($codigo, $produto, $data_validade, $preco, $imagem);

// Cria o serviço
$service = new ProdutoService($mysqli);

// Adiciona no banco/
if ($service->adicionar($p)) {
    echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='../view/formProduto.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar o produto'); history.back();</script>";
}
?>
