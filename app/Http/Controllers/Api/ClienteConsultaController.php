<?php

namespace App\Http\Controllers\Api;

use App\Application\UseCases\ConsultarClientePorCpf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteConsultaController extends Controller
{
    private ConsultarClientePorCpf $consultarClientePorCpf;

    public function __construct(ConsultarClientePorCpf $consultarClientePorCpf)
    {
        $this->consultarClientePorCpf = $consultarClientePorCpf;
    }

    /**
     * @OA\Get(
     *     path="/api/clientes/{cpf}",
     *     operationId="getClienteByCpf",
     *     tags={"Clientes"},
     *     summary="Consulta cliente por CPF",
     *     description="Retorna os dados do cliente a partir do CPF",
     *     @OA\Parameter(
     *         name="cpf",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         description="CPF do cliente"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cliente encontrado",
     *         @OA\JsonContent(ref="#/components/schemas/Cliente")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cliente não encontrado"
     *     )
     * )
     */
    public function consultarPorCpf(string $cpf): JsonResponse
    {
        $cliente = $this->consultarClientePorCpf->execute($cpf);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        return response()->json([
            'id_cliente' => $cliente->id_cliente,
            'cpf' => $cliente->cpf,
            'nome' => $cliente->nome,
        ]);
    }
}

