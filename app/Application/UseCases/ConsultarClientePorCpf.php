<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\ClienteRepositoryInterface;
use App\Domain\Entities\Cliente;

class ConsultarClientePorCpf
{
    private ClienteRepositoryInterface $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function execute(string $cpf): ?Cliente
    {
        return $this->clienteRepository->findByCpf($cpf);
    }
}

