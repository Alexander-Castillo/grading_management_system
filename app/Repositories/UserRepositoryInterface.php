<?php
namespace App\Repositories;
use App\Models\User;
interface UserRepositoryInterface{
    // funciones de la base de datos
    public function create(array $data): User;
    public function findById(int $id): User;
    public function findByEmail(string $email): User;
}