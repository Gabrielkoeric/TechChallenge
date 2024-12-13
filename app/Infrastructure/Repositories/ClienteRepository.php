<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\ClienteRepositoryInterface;
use App\Domain\Entities\Cliente;
use App\Models\Cliente as ClienteModel;

class ClienteRepository implements ClienteRepositoryInterface
{
    public function create(array $data): Cliente
    {
        $clienteModel = ClienteModel::create($data);

        return new Cliente(
            $clienteModel->id_cliente,
            $clienteModel->cpf,
            $clienteModel->nome
        );
    }
}

