<?php

namespace App\Domain\Entities;

class Cliente
{
    public function __construct(?int $id_cliente = null, string $nome, string $cpf)
    {
        $this->id_cliente = $id_cliente; // Pode ser null ao criar um novo registro.
        $this->nome = $nome;
        $this->cpf = $cpf;
    }
}
