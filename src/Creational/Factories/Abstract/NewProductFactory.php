<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Abstract;

use Codenip\Creational\Factories\Abstract\Interface\Product;
use Codenip\Creational\Factories\Abstract\Interface\ProductFactory;
use Codenip\Creational\Factories\Abstract\Interface\SparePartProduct;
use Codenip\Creational\Factories\Abstract\Product\NewProduct;
use Codenip\Creational\Factories\Abstract\SparePartProduct\NewSparePartProduct;

class NewProductFactory implements ProductFactory
{
    public function createProduct(): Product
    {
        return new NewProduct();
    }

    public function createSparePartProduct(): SparePartProduct
    {
        return new NewSparePartProduct();
    }
}
