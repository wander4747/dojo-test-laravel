<?php

namespace Core\User\Domain\Entity;

use Core\Shared\Domain\Property;
use Core\Shared\DomainValidation;
use Illuminate\Support\Facades\Hash;

class User
{
    use Property;

    public function __construct(
        protected string $name,
        protected string $email,
        protected ?int $id = null,
        protected ?string $password = null,
        protected ?string $createdAt = ""
    )
    {
        $this->password = $this->password == null ? "" : Hash::make($this->password);
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
    }
}
