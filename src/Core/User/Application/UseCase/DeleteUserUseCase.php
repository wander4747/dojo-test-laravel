<?php

namespace Core\User\Application\UseCase;

use Core\User\Application\Dto\DeleteUserInputDto;
use Core\User\Application\Dto\DeleteUserOutputDto;
use Core\User\Domain\Repository\UserRepositoryInterface;

class DeleteUserUseCase
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function execute(DeleteUserInputDto $input): DeleteUserOutputDto
    {
        $response = $this->repository->delete($input->id);

        return new DeleteUserOutputDto(
            success: $response
        );
    }
}
