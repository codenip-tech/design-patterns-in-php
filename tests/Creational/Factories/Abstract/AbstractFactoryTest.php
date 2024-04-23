<?php

declare(strict_types=1);

namespace Codenip\Tests\Creational\Factories\Abstract;

use Codenip\Creational\Factories\Abstract\NewProductFactory;
use Codenip\Creational\Factories\Abstract\Product\NewProduct;
use Codenip\Creational\Factories\Abstract\Product\UsedProduct;
use Codenip\Creational\Factories\Abstract\SparePartProduct\NewSparePartProduct;
use Codenip\Creational\Factories\Abstract\SparePartProduct\UsedSparePartProduct;
use Codenip\Creational\Factories\Abstract\UsedProductFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function testNewProductFactory(): void
    {
        $factory = new NewProductFactory();

        $product = $factory->createProduct();
        $sparePart = $factory->createSparePartProduct();

        self::assertInstanceOf(NewProduct::class, $product);
        self::assertInstanceOf(NewSparePartProduct::class, $sparePart);
    }

    public function testUsedProductFactory(): void
    {
        $factory = new UsedProductFactory();

        $product = $factory->createProduct();
        $sparePart = $factory->createSparePartProduct();

        self::assertInstanceOf(UsedProduct::class, $product);
        self::assertInstanceOf(UsedSparePartProduct::class, $sparePart);
    }
}
