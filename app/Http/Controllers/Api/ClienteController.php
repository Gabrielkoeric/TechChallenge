<?php

namespace App\Http\Controllers\Api;

use App\Application\UseCases\CreateClienteUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class ClienteController
{
    private CreateClienteUseCase $createClienteUseCase;

    public function __construct(CreateClienteUseCase $createClienteUseCase)
    {
        $this->createClienteUseCase = $createClienteUseCase;
    }

    /**
     * @OA\Post(
     *     path="/api/cliente",
     *     operationId="createCliente",
     *     tags={"Clientes"},
     *     summary="Cadastrar um cliente",
     *     description="Cadastra um novo cliente no sistema",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Cliente")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cliente cadastrado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Cliente")
     *     )
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $cliente = $this->createClienteUseCase->execute($request->all());

        return response()->json($cliente, 201);
    }
}

