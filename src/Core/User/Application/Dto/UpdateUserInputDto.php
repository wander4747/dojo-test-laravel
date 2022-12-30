<?php

namespace Core\User\Application\Dto;

class UpdateUserInputDto
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $password = null,
    )
    {
    }
}
