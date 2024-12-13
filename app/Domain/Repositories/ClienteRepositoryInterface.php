<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Cliente;

interface ClienteRepositoryInterface
{
    public function create(array $data): Cliente;
}

