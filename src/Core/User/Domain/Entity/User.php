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
        protected ?string $email = null,
        protected ?int $id = null,
        protected ?string $password = null,
        protected ?string $createdAt = ""
    )
    {
        $this->validate();
        $this->generatePassword();
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

    public function password(): string
    {
        return (string) $this->password;
    }

    /**
     * @return void
     */
    public function generatePassword(): void
    {
        if (!is_null($this->password)) {
            $this->password = Hash::make($this->password);
        }
    }
}
