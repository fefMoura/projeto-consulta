<?php
include("../model/modelProduto.php");
include("produtoService.php");
include("conexao.php"); // $mysqli do MySQLi

// Recebe dados do formulário
$codigo = $_POST["codigo"];
$produto = $_POST['produto'];
$data_validade = $_POST['data_validade'];
$preco = $_POST['preco'];
$imagem = file_get_contents($_FILES['imagem']['tmp_name']);

// Cria serviço
$service = new ProdutoService($mysqli);

// Verifica se o produto já existe
$produtoExistente = $service->consultarPorCodigo($codigo);
if ($produtoExistente) {
    echo "<script>alert('Produto com esse código já existe!'); history.back();</script>";
    exit();
}

// Cria objeto Produto
$p = new Produto($codigo, $produto, $data_validade, $preco, $imagem);

// Adiciona no banco
if ($service->adicionar($p)) {
    echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href='../view/formProduto.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar o produto'); history.back();</script>";
}
?>
