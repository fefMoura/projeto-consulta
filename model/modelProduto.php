<?php

class Produto {
    private $codigo;
    private $produto;
    private $data_validade;
    private $preco;
    private $imagem;
    private $idusuario; // FK

    public function __construct($codigo, $produto, $data_validade, $preco, $imagem, $idusuario) {
        $this->codigo = $codigo;
        $this->produto = $produto;
        $this->data_validade = $data_validade;
        $this->preco = $preco;
        $this->imagem = $imagem;
        $this->idusuario = $idusuario;
    }

    // Getters
    public function getCodigo() {
        return $this->codigo;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function getDataValidade() {
        return $this->data_validade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getIdUsuario() {
        return $this->idusuario;
    }
}
