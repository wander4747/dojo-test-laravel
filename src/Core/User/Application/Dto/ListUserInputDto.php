<?php

namespace Core\User\Application\Dto;

class ListUserInputDto
{
    public function __construct(
        public string $id = '',
    )
    {
    }
}
