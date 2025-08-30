<?php

require_once "../model/modelProduto.php";
class produtoService{
  
    private $conn;

  public function __construct($conn) {
        $this->conn = $conn;
    }


public static function consultarTodos($conn) {
        $sql = "SELECT * FROM produtos";
        $result = $conn->query($sql);
        $produtos = [];
        while ($row = $result->fetch_assoc()) {
            $produtos[] = new Produto(
                $row['codigo'],
                $row['produto'],
                $row['data_validade'],
                $row['preco'],
                $row['foto']
            );
        }
        return $produtos;
    }

    public static function consultarPorCodigo($conn, $codigo) {
        $sql = "SELECT * FROM produtos WHERE codigo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $codigo);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Produto(
                $row['codigo'],
                $row['produto'],
                $row['data_validade'],
                $row['preco'],
                $row['foto']
            );
        }
        return null;
    }

    public function adicionar($conn) {
    $sql = "INSERT INTO produtos (produto, data_validade, preco, foto) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros com um placeholder para o BLOB
    $null = NULL; // placeholder para a foto
    $stmt->bind_param("ssds", $this->produto, $this->data_validade, $this->preco, $null);

    // Envia os dados do BLOB
    $stmt->send_long_data(3, $this->foto); // índice começa em 0

    return $stmt->execute();
}


  public function atualizar($conn) {
    $sql = "UPDATE produtos SET produto = ?, data_validade = ?, preco = ?, foto = ? WHERE codigo = ?";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros com placeholder para BLOB
    $null = NULL; // placeholder para foto
    $stmt->bind_param("ssdsi", $this->produto, $this->data_validade, $this->preco, $null, $this->codigo);

    // Envia os dados do BLOB
    $stmt->send_long_data(3, $this->foto); // índice começa em 0, então 3 = 4º parâmetro

    return $stmt->execute();
}


    public static function excluir($conn, $codigo) {
        $sql = "DELETE FROM produtos WHERE codigo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $codigo);
        return $stmt->execute();
    }

}

?>