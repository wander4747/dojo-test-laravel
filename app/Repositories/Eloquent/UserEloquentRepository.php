<?php

namespace App\Repositories\Eloquent;

use App\Models\User as Model;
use Core\User\Domain\Entity\User;
use Core\User\Domain\Repository\UserRepositoryInterface;

class UserEloquentRepository implements UserRepositoryInterface
{

    public function __construct(private Model $user)
    {
    }

    public function insert(User $entity): User
    {
        $user = $this->user->create([
            'name' => $entity->name,
            'email' => $entity->email,
            'password' => $entity->password,
        ]);



        return $this->toUser($user);
    }

    public function findById(string $id): User
    {
        // TODO: Implement findById() method.
    }

    public function findAll(string $filter = '', $order = 'DESC'): array
    {
        // TODO: Implement findAll() method.
    }

    public function update(User $user): User
    {
        // TODO: Implement update() method.
    }

    public function delete(string $id): bool
    {
        // TODO: Implement delete() method.
    }

    private function toUser(object $object): User
    {
        return new User(
            id: $object->id,
            name: $object->name,
            email: $object->email,
            createdAt: $object->created_at
        );
    }
}
