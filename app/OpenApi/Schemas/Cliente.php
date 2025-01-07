<?php

namespace App\OpenApi\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Cliente",
 *     type="object",
 *     title="Cliente",
 *     description="Esquema do cliente para a API",
 *     required={"cpf", "nome"},
 *     @OA\Property(
 *         property="id_cliente",
 *         type="integer",
 *         description="ID único do cliente",
 *         nullable=true
 *     ),
 *     @OA\Property(
 *         property="cpf",
 *         type="string",
 *         description="CPF do cliente"
 *     ),
 *     @OA\Property(
 *         property="nome",
 *         type="string",
 *         description="Nome completo do cliente"
 *     )
 * )
 */
class Cliente
{
}
