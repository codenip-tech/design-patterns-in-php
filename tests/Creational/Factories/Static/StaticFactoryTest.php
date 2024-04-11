<?php

declare(strict_types=1);

namespace Codenip\Tests\Creational\Factories\Static;

use Codenip\Creational\Factories\Static\BoxFactory;
use Codenip\Creational\Factories\Static\BoxFactoryWithParameter;
use PHPUnit\Framework\TestCase;

use function mb_strtolower;

class StaticFactoryTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCreateBoxWithParameter(string $size): void
    {
        $factoryWithParameter = new BoxFactoryWithParameter();
        $box = $factoryWithParameter::fromSize($size);

        self::assertEquals($size, mb_strtolower($box->size()));
    }

    public function testCreateBox(): void
    {
        $factory = new BoxFactory();

        $box = $factory::createSmallBox();
        self::assertEquals('Small', $box->size());

        $box = $factory::createMediumBox();
        self::assertEquals('Medium', $box->size());

        $box = $factory::createLargeBox();
        self::assertEquals('Large', $box->size());
    }

    public static function dataProvider(): iterable
    {
        yield 'small' => [
            'size' => 'small',
        ];

        yield 'medium' => [
            'size' => 'medium',
        ];

        yield 'large' => [
            'size' => 'large',
        ];
    }
}
