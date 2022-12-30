<?php

namespace Core\Shared\Domain;

use Exception;

trait Property
{
    /**
     * @throws \Exception
     */
    public function __get($property)
    {
        if (isset($this->{$property})) {
            return $this->{$property};
        }

        $className = get_class($this);
        throw new Exception("Property {$property} not found in class {$className}");
    }

    public function id(): string
    {
        return (string) $this->id;
    }
}
