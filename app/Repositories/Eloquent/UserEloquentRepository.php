<?php

namespace App\Repositories\Eloquent;

use App\Models\User as Model;
use Core\Shared\Exception\NotFoundException;
use Core\User\Domain\Entity\User;
use Core\User\Domain\Repository\UserRepositoryInterface;

class UserEloquentRepository implements UserRepositoryInterface
{

    public function __construct(private Model $model)
    {
    }

    public function insert(User $entity): User
    {
        $user = $this->model->create([
            'name' => $entity->name,
            'email' => $entity->email,
            'password' => $entity->password,
        ]);

        return $this->toUser($user);
    }

    public function findById(string $id): User
    {
        if (!$user = $this->model->find($id)) {
            throw new NotFoundException("User not found");
        }

        return $this->toUser($user);
    }

    public function findAll(string $filter = '', $order = 'DESC'): array
    {
        $query = $this->model;
        if ($filter) {
            $query = $query->where('name', 'LIKE', "%{$filter}%");
        }

        $query = $query->orderBy('id', $order);
        $paginator = $query->paginate();

        return $paginator->toArray();
    }

    public function update(User $user): User
    {
        if (!$userDb = $this->model->find($user->id())) {
            throw new NotFoundException('User Not Found');
        }

        if (!empty($user->password())) {
            $data['password'] = $user->password();
        }

        $data['name'] =  $user->name;

        $userDb->update($data);

        $userDb->refresh();

        return $this->toUser($userDb);
    }

    public function delete(string $id): bool
    {
        if (!$userDb = $this->model->find($id)) {
            throw new NotFoundException('User Not Found');
        }

        return $userDb->delete();
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
