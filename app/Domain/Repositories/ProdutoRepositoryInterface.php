<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Produto;

interface ProdutoRepositoryInterface
{
    public function create(array $data): Produto;
    public function update(int $id_produto, array $data): Produto;
    public function delete(int $id_produto): bool;
    public function findById(int $id_produto): ?Produto;
}

