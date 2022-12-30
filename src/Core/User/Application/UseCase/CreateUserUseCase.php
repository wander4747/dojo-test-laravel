<?php

namespace Core\User\Application\UseCase;

use Core\User\Application\Dto\CreateUserInputDto;
use Core\User\Application\Dto\CreateUserOutputDto;
use Core\User\Domain\Entity\User;
use Core\User\Domain\Repository\UserRepositoryInterface;

class CreateUserUseCase
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function execute(CreateUserInputDto $input): CreateUserOutputDto
    {
        $user = new User(
            name: $input->name,
            email: $input->email,
            password: $input->password
        );

        $newUser = $this->repository->insert($user);

        return new CreateUserOutputDto(
            id: $newUser->id,
            name:$newUser->name,
            email: $newUser->email,
            createdAt: $newUser->createdAt
        );
    }
}
