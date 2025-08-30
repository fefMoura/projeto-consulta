<?php

class Produto
{
    public $codigo;
    public $produto;
    public $data_validade;
    public $preco;
    public $imagem; // blob

    public function __construct($codigo = null, $produto = null, $data_validade = null, $preco = null, $imagem = null)
    {
        $this->codigo = $codigo;
        $this->produto = $produto;
        $this->data_validade = $data_validade;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }
    

}