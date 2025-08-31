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
                $row['imagem'],
                $row['idusuario']
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
                $row['imagem'],
                $row['idusuario']
            );
        }
        return null;
    }

public function adicionar(Produto $p) {
    $stmt = $this->mysqli->prepare(
        "INSERT INTO produtos (codigo, produto, data_validade, preco, imagem, idusuario) 
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    if (!$stmt) die("Erro no prepare: " . $this->mysqli->error);

    // Valores em variáveis
    $codigo       = $p->getCodigo();
    $produto      = $p->getProduto();
    $dataValidade = $p->getDataValidade();
    $preco        = $p->getPreco();
    $idusuario    = $p->getIdUsuario();
    $imagem       = $p->getImagem();
    $null         = NULL;

    // Bind (imagem como BLOB é placeholder NULL)
    $stmt->bind_param("sssdbi", $codigo, $produto, $dataValidade, $preco, $null, $idusuario);

    // Envia o conteúdo do BLOB
    $stmt->send_long_data(4, $imagem); // 4º índice = 5º parâmetro (imagem)

    // Executa
    if (!$stmt->execute()) {
        die("Erro no execute: " . $stmt->error);
    }

    return true;
}




public function atualizar(Produto $p) {
    $sql = "UPDATE produtos 
            SET produto = ?, data_validade = ?, preco = ?, imagem = ? 
            WHERE codigo = ?";
    $stmt = $this->mysqli->prepare($sql);
    if (!$stmt) die("Erro no prepare: " . $this->mysqli->error);

    $null = NULL;

    // produto (s), data_validade (s), preco (d), imagem (b), codigo (s)
    $stmt->bind_param(
        "ssd bs",
        $p->getProduto(),
        $p->getDataValidade(),
        $p->getPreco(),
        $null,
        $p->getCodigo()
    );

    // Envia a imagem (4º parâmetro → índice 3)
    $stmt->send_long_data(3, $p->getImagem());

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