<?php

namespace Core\User\Application\UseCase;

use Core\User\Application\Dto\{ListUserInputDto, ListUserOutputDto};
use Core\User\Domain\Repository\UserRepositoryInterface;

class ListUserUseCase
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function execute(ListUserInputDto $input): ListUserOutputDto
    {
        $user = $this->repository->findById($input->id);

        return new ListUserOutputDto(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            createdAt: $user->createdAt,
        );
    }
}
