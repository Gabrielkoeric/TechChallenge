<?php

namespace App\Http\Controllers\Api;

use App\Application\UseCases\GetUsersUseCase;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API Documentation",
 *     description="API documentation using Swagger"
 * )
 */
class UserController
{
    private GetUsersUseCase $getUsersUseCase;

    public function __construct(GetUsersUseCase $getUsersUseCase)
    {
        $this->getUsersUseCase = $getUsersUseCase;
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     operationId="getUsers",
     *     tags={"Users"},
     *     summary="Retrieve list of users",
     *     description="Returns all users from the database",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/User")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $users = $this->getUsersUseCase->execute();
        return response()->json($users);
    }
}
