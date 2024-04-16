<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Simple;

readonly class CarService
{
    public function __construct(
        private SimpleCarFactory $simpleCarFactory,
    ) {}

    public function createCar(string $type): void
    {
        $car = $this->simpleCarFactory->create($type);
    }
}
