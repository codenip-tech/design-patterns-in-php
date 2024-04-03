<?php

declare(strict_types=1);

namespace Codenip\Structural\DataMapper\Entity;

readonly class User
{
    private function __construct(
        private string $id,
        private string $name,
        private string $email,
        private bool $active,
    ) {}

    public static function create(string $id, string $name, string $email, bool $active): self
    {
        return new self($id, $name, $email, $active);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
