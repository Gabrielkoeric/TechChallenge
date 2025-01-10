<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Cliente;

interface ClienteRepositoryInterface
{
    public function create(array $data): Cliente;

    /**
     * Consulta um cliente pelo CPF.
     *
     * @param string $cpf
     * @return Cliente|null
     */
    public function findByCpf(string $cpf): ?Cliente;
}
