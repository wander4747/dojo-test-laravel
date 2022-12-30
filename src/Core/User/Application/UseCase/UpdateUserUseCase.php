<?php

namespace Core\User\Application\UseCase;

use Core\User\Application\Dto\{UpdateUserInputDto, UpdateUserOutputDto};
use Core\User\Domain\Entity\User;
use Core\User\Domain\Repository\UserRepositoryInterface;

class UpdateUserUseCase
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function execute(UpdateUserInputDto $input): UpdateUserOutputDto
    {
        $user = new User(
            name: $input->name,
            id: $input->id,
            password: $input->password
        );

        $userUpdated = $this->repository->update($user);

        return new UpdateUserOutputDto(
            id: $userUpdated->id,
            name:$userUpdated->name,
            email: $userUpdated->email,
            createdAt: $userUpdated->createdAt
        );
    }
}
