<?php

namespace Core\User\Application\UseCase;

use Core\User\Application\Dto\ListUsersInputDto;
use Core\User\Application\Dto\ListUsersOutputDto;
use Core\User\Domain\Repository\UserRepositoryInterface;

class ListUsersUseCase
{
    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function execute(ListUsersInputDto $input): ListUsersOutputDto
    {
        $users = $this->repository->findAll(
            filter: $input->filter,
            order: $input->order
        );

        return new ListUsersOutputDto(
            items: $users['data'],
            total: $users['total'],
            current_page: $users['current_page'],
            last_page: $users['last_page'],
            first_page: 1,
            per_page: $users['per_page'],
            to: $users['to'],
            from: $users['from'],
        );
    }
}
