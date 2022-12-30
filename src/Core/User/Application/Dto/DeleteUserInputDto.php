<?php

namespace Core\User\Application\Dto;

class DeleteUserInputDto
{
    public function __construct(
        public string $id = '',
    )
    {
    }
}
