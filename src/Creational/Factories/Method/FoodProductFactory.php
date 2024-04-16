<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Method;

use Codenip\Creational\Factories\Method\Product\FoodProduct;
use Codenip\Creational\Factories\Method\Product\Product;

class FoodProductFactory extends ProductFactory
{
    public function create(): Product
    {
        return new FoodProduct();
    }
}
