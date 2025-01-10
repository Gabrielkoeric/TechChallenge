<?php

namespace App\Domain\Entities;

class Produto
{
    public int $id_produto;
    public string $nome;
    public int $id_categoria;
    public string $valor;
    
    public function __construct(int $id_produto, string $nome, int $id_categoria, string $valor)
    {
        $this->id_produto = $id_produto;
        $this->nome = $nome;
        $this->id_categoria = $id_categoria;
        $this->valor = $valor;
    }
}

