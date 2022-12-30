<?php

namespace Core\User\Application\Dto;

class ListUsersInputDto
{
    public function __construct(
        public string $filter = '',
        public string $order = 'DESC',
    )
    {
    }
}
