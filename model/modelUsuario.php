<?php

class User
{
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $senha;

    public function __construct($id = null, $nome = '',$sobrenome = '', $email = '', $senha = '')
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function toArray()
    {
        return [
            'id'    => $this->id,
            'nome'  => $this->nome,
            'sobrenome'=> $this->sobrenome,
            'email' => $this->email,
            'senha'=> $this->senha
        ];
    }

}