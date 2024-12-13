<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\ClienteRepositoryInterface;
use App\Domain\Entities\Cliente;

class CreateClienteUseCase
{
    private ClienteRepositoryInterface $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function execute(array $data): Cliente
    {
        return $this->clienteRepository->create($data);
    }
}

