<?php

declare(strict_types=1);

namespace Codenip\Tests\Creational\Factories\Method;

use Codenip\Creational\Factories\Method\ElectronicProductFactory;
use Codenip\Creational\Factories\Method\FoodProductFactory;
use Codenip\Creational\Factories\Method\Product\ElectronicProduct;
use Codenip\Creational\Factories\Method\Product\FoodProduct;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testElectronicProductFactory(): void
    {
        $factory = new ElectronicProductFactory();
        $product = $factory->create();

        self::assertInstanceOf(ElectronicProduct::class, $product);
        self::assertEquals('electronic', $factory->getType());
    }

    public function testFoodProductFactory(): void
    {
        $factory = new FoodProductFactory();
        $product = $factory->create();

        self::assertInstanceOf(FoodProduct::class, $product);
        self::assertEquals('food', $factory->getType());
    }
}
