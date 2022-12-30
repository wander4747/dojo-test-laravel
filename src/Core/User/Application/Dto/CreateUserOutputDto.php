<?php

namespace Core\User\Application\Dto;

class CreateUserOutputDto
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $createdAt
    )
    {
    }
}
