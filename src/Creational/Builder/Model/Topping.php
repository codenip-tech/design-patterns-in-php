<?php

declare(strict_types=1);

namespace Codenip\Creational\Builder\Model;

readonly class Topping
{
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }
}
