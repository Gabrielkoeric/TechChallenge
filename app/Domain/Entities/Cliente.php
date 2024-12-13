<?php

namespace App\Domain\Entities;

class Cliente
{
    public function __construct(
        public int $id_cliente,
        public string $cpf,
        public string $nome
    ) {
    }
}

