<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Entities\Produto;
use App\Domain\Repositories\ProdutoRepositoryInterface;
use App\Models\Produto as ProdutoModel;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function create(array $data): Produto
    {
        $produto = ProdutoModel::create($data);
        return new Produto(
            $produto->id_produto,
            $produto->nome,
            $produto->id_categoria,
            $produto->valor
        );
    }

    public function update(int $id_produto, array $data): Produto
    {
        $produto = ProdutoModel::findOrFail($id_produto);
        $produto->update($data);
        return new Produto(
            $produto->id_produto,
            $produto->nome,
            $produto->id_categoria,
            $produto->valor
        );
    }

    public function delete(int $id_produto): bool
    {
        $produto = ProdutoModel::findOrFail($id_produto);
        return $produto->delete();
    }

    public function findById(int $id_produto): ?Produto
    {
        $produto = ProdutoModel::find($id_produto);
        if ($produto) {
            return new Produto(
                $produto->id_produto,
                $produto->nome,
                $produto->id_categoria,
                $produto->valor
            );
        }
        return null;
    }
}

