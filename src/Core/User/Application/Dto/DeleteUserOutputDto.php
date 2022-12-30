<?php

namespace Core\User\Application\Dto;

class DeleteUserOutputDto
{
    public function __construct(
        public bool $success
    )
    {
    }
}
