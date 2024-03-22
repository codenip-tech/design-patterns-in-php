<?php

declare(strict_types=1);

namespace Codenip\Tests\Creational\Builder;

use Codenip\Creational\Builder\Model\Topping;
use Codenip\Creational\Builder\PizzaBuilder;
use Codenip\Creational\Builder\Values\Cheese;
use Codenip\Creational\Builder\Values\Dough;
use Codenip\Creational\Builder\Values\Size;
use Codenip\Creational\Builder\Values\Toppings;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function testCreatePizza(): void
    {
        $pizza = (new PizzaBuilder())
            ->setSize(Size::MEDIUM)
            ->setDough(Dough::CHEESE_BORDER)
            ->setCheese(Cheese::MOZZARELLA)
            ->setToppings([
                new Topping(Toppings::ANCHOVY),
                new Topping(Toppings::TUNA),
            ])
            ->build();

        self::assertEquals(Size::MEDIUM, $pizza->getSize());
        self::assertEquals(Dough::CHEESE_BORDER, $pizza->getDough());
        self::assertEquals(Cheese::MOZZARELLA, $pizza->getCheese());
        self::assertCount(2, $pizza->getToppings());
        self::assertEquals(Toppings::ANCHOVY, $pizza->getToppings()[0]->getName());
        self::assertEquals(Toppings::TUNA, $pizza->getToppings()[1]->getName());
    }
}
