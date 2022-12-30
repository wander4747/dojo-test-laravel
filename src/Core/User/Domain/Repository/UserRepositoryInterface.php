<?php

namespace Core\User\Domain\Repository;

use Core\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function insert(User $entity): User;
    public function findById(string $id): User;
    public function findAll(string $filter = '', $order = 'DESC'): array;
    public function update(User $user): User;
    public function delete(string $id): bool;
}
