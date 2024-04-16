<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Method\Product;

class FoodProduct implements Product
{
    public function type(): string
    {
        return 'food';
    }
}
