<?php

require_once "../model/modelProduto.php";
class ProdutoService {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function consultarTodos() {
        $sql = "SELECT * FROM produtos";
        $result = $this->mysqli->query($sql);
        $produtos = [];
        while ($row = $result->fetch_assoc()) {
            $produtos[] = new Produto(
                $row['codigo'],
                $row['produto'],
                $row['data_validade'],
                $row['preco'],
                $row['imagem']
            );
        }
        return $produtos;
    }

    public function consultarPorCodigo($codigo) {
        $sql = "SELECT * FROM produtos WHERE codigo = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $codigo);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Produto(
                $row['codigo'],
                $row['produto'],
                $row['data_validade'],
                $row['preco'],
                $row['imagem']
            );
        }
        return null;
    }

public function adicionar(Produto $p) {
    $sql = "INSERT INTO produtos (codigo, produto, data_validade, preco, imagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->mysqli->prepare($sql);
    if (!$stmt) die("Erro no prepare: " . $this->mysqli->error);

    // Placeholder para BLOB
    $null = NULL;

    // Bind dos parâmetros: 
    // 0 => codigo (i)
    // 1 => produto (s)
    // 2 => data_validade (s)
    // 3 => preco (d)
    // 4 => imagem (b = BLOB)
    $stmt->bind_param("issdb", $p->codigo, $p->produto, $p->data_validade, $p->preco, $null);

    // Envia o BLOB
    $stmt->send_long_data(4, $p->imagem); // índice 4 = 5º parâmetro

    if (!$stmt->execute()) die("Erro no execute: " . $stmt->error);
    return true;
}



public function atualizar(Produto $p) {
    $sql = "UPDATE produtos SET produto = ?, data_validade = ?, preco = ?, imagem = ? WHERE codigo = ?";
    $stmt = $this->mysqli->prepare($sql);
    if (!$stmt) die("Erro no prepare: " . $this->mysqli->error);

    $null = NULL;

    // Bind: produto (s), data_validade (s), preco (d), imagem (b), codigo (i)
    $stmt->bind_param("ssdbi", $p->produto, $p->data_validade, $p->preco, $null, $p->codigo);

    // Envia a imagem
    $stmt->send_long_data(3, $p->imagem); // índice 3 = 4º parâmetro (imagem)

    if (!$stmt->execute()) die("Erro no execute: " . $stmt->error);
    return true;
}

    public function excluir($codigo) {
        $sql = "DELETE FROM produtos WHERE codigo = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }
}


?>