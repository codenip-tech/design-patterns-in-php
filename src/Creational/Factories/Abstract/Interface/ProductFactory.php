<?php

declare(strict_types=1);

namespace Codenip\Creational\Factories\Abstract\Interface;

interface ProductFactory
{
    public function createProduct(): Product;

    public function createSparePartProduct(): SparePartProduct;
}
