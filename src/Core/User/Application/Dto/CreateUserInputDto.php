<?php

namespace Core\User\Application\Dto;

class CreateUserInputDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {
    }
}
