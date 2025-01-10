<?php

namespace App\Http\Controllers\Api;

use App\Domain\Repositories\ProdutoRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    private ProdutoRepositoryInterface $produtoRepository;

    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    /**
     * @OA\Post(
     *     path="/api/produtos",
     *     summary="Criar Produto",
     *     description="Cria um novo produto",
     *     operationId="createProduto",
     *     tags={"Produto"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nome", "id_categoria", "valor"},
     *             @OA\Property(property="nome", type="string", example="Produto Exemplo"),
     *             @OA\Property(property="id_categoria", type="integer", example=1),
     *             @OA\Property(property="valor", type="string", example="100.50")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Produto criado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="id_produto", type="integer", example=1),
     *             @OA\Property(property="nome", type="string", example="Produto Exemplo"),
     *             @OA\Property(property="id_categoria", type="integer", example=1),
     *             @OA\Property(property="valor", type="string", example="100.50")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos"
     *     )
     * )
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'id_categoria' => 'required|integer',
            'valor' => 'required|string|max:255',
        ]);

        $produto = $this->produtoRepository->create($data);

        return response()->json($produto, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/produtos/{id_produto}",
     *     summary="Editar Produto",
     *     description="Atualiza um produto existente",
     *     operationId="updateProduto",
     *     tags={"Produto"},
     *     @OA\Parameter(
     *         name="id_produto",
     *         in="path",
     *         description="ID do produto",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nome", "id_categoria", "valor"},
     *             @OA\Property(property="nome", type="string", example="Produto Atualizado"),
     *             @OA\Property(property="id_categoria", type="integer", example=2),
     *             @OA\Property(property="valor", type="string", example="150.75")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Produto atualizado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="id_produto", type="integer", example=1),
     *             @OA\Property(property="nome", type="string", example="Produto Atualizado"),
     *             @OA\Property(property="id_categoria", type="integer", example=2),
     *             @OA\Property(property="valor", type="string", example="150.75")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos"
     *     )
     * )
     */
    public function update(int $id_produto, Request $request): JsonResponse
    {
        $data = $request->validate([
            'nome' => 'string|max:255',
            'id_categoria' => 'integer',
            'valor' => 'string|max:255',
        ]);

        $produto = $this->produtoRepository->update($id_produto, $data);

        return response()->json($produto);
    }

    /**
     * @OA\Delete(
     *     path="/api/produtos/{id_produto}",
     *     summary="Remover Produto",
     *     description="Remove um produto existente",
     *     operationId="deleteProduto",
     *     tags={"Produto"},
     *     @OA\Parameter(
     *         name="id_produto",
     *         in="path",
     *         description="ID do produto",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Produto removido com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Produto não encontrado"
     *     )
     * )
     */
    public function delete(int $id_produto): JsonResponse
    {
        $success = $this->produtoRepository->delete($id_produto);

        return response()->json(['success' => $success]);
    }
}
