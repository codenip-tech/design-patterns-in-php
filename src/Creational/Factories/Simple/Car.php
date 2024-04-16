<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Simple;

readonly class Car
{
    public function __construct(
        private string $type,
    ) {}

    public function type(): string
    {
        return $this->type;
    }
}
