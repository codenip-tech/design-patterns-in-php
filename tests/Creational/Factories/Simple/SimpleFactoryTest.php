<?php

declare(strict_types=1);

namespace Codenip\Tests\Creational\Factories\Simple;

use Codenip\Creational\Factories\Simple\SimpleCarFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCreateCar(string $type): void
    {
        $factory = new SimpleCarFactory();
        $car = $factory->create($type);

        self::assertEquals($type, $car->type());
    }

    public static function dataProvider(): iterable
    {
        yield 'electric' => [
            'type' => 'electric',
        ];

        yield 'gasoline' => [
            'type' => 'gasoline',
        ];

        yield 'diesel' => [
            'type' => 'diesel',
        ];
    }
}
