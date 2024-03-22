<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Specification\Model;

readonly class User
{
    public function __construct(
        private int $id,
        private string $name,
        private int $age,
        private bool $active,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
