<?php
namespace App\Repositories;
use App\Models\User;
class EloquentUserRepository extends UserRepositoryInterface{
    // crear usuarios
    public function create(array $data): User{
        return User::create($data);
    }
    // encontrar un usuario por id
    public function findById(int $id): ?User{
        return User::find($id);
    }
    // encontrar un usuario por email
    public function findByEmail(string $email): ?User{
        return User::where('email', $email)->first();
    }
}