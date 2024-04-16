<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Method;

use Codenip\Creational\Factories\Method\Product\ElectronicProduct;
use Codenip\Creational\Factories\Method\Product\Product;

class ElectronicProductFactory extends ProductFactory
{
    public function create(): Product
    {
        return new ElectronicProduct();
    }
}
