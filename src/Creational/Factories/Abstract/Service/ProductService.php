<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Abstract\Service;

use Codenip\Creational\Factories\Abstract\NewProductFactory;
use Codenip\Creational\Factories\Abstract\UsedProductFactory;

class ProductService
{
    public function createProduct(string $type): void
    {
        $factory = new NewProductFactory();

        if ('used' === $type) {
            $factory = new UsedProductFactory();
        }

        $product = $factory->createProduct();
        $sparePart = $factory->createSparePartProduct();
    }
}
