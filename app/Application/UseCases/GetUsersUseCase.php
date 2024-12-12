<?php

namespace App\Application\UseCases;

use App\Domain\Repositories\UserRepositoryInterface;

class GetUsersUseCase
{
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function execute(): array
    {
        return $this->userRepository->getAll();
    }
}