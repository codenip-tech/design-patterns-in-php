<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Method;

use Codenip\Creational\Factories\Method\Product\Product;

abstract class ProductFactory
{
    abstract public function create(): Product;

    public function getType(): string
    {
        $product = $this->create();

        return $product->type();
    }
}
