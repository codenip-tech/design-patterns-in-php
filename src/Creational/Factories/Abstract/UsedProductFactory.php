<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Abstract;

use Codenip\Creational\Factories\Abstract\Interface\Product;
use Codenip\Creational\Factories\Abstract\Interface\ProductFactory;
use Codenip\Creational\Factories\Abstract\Interface\SparePartProduct;
use Codenip\Creational\Factories\Abstract\Product\UsedProduct;
use Codenip\Creational\Factories\Abstract\SparePartProduct\UsedSparePartProduct;

class UsedProductFactory implements ProductFactory
{
    public function createProduct(): Product
    {
        return new UsedProduct();
    }

    public function createSparePartProduct(): SparePartProduct
    {
        return new UsedSparePartProduct();
    }
}
