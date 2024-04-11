<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Simple;

class SimpleCarFactory
{
    public function __construct()
    {
        // include extra dependencies
    }

    public function create(string $type): Car
    {
        // use dependencies for business logic
        return new Car($type);
    }
}
