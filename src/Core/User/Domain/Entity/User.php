<?php

namespace Core\User\Domain\Entity;

use Core\Shared\DomainValidation;

class User
{
    public function __construct(
        protected string $name,
        protected string $email
    )
    {
        $this->validate();
    }

    public function update(string $name): void
    {
        $this->name = $name;
        $this->validate();
    }

    private function validate()
    {
        DomainValidation::strMaxLength($this->name);
        DomainValidation::strMinLength($this->name);
        DomainValidation::strCanNullAndMaxLength($this->description);
    }
}
