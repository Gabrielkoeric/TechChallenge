<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getAll(): array
    {
        $users = DB::table('users')->get();

        return $users->map(fn ($user) => new User($user->id, $user->name, $user->email))->toArray();
    }
}