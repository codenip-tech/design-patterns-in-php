<?php

declare(strict_types=1);

namespace Codenip\Tests\Behavioral\Strategy;

use Codenip\Behavioral\Strategy\FixedAmountDiscountStrategy;
use Codenip\Behavioral\Strategy\Model\Product;
use Codenip\Behavioral\Strategy\NoDiscountStrategy;
use Codenip\Behavioral\Strategy\OrderProcessor;
use Codenip\Behavioral\Strategy\PercentageDiscountStrategy;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testDiscountStrategy(OrderProcessor $processor, float $expectedFinalPrice): void
    {
        $product = new Product('MacBook Pro M3', 4000);

        $finalPrice = $processor->calculateFinalPrice($product);

        self::assertEquals($expectedFinalPrice, $finalPrice);
    }

    public static function dataProvider(): iterable
    {
        yield 'No discount' => [
            'processor' => new OrderProcessor(new NoDiscountStrategy()),
            'expectedFinalPrice' => 4000,
        ];

        yield 'Percentage discount' => [
            'processor' => new OrderProcessor(new PercentageDiscountStrategy(10)),
            'expectedFinalPrice' => 3600,
        ];

        yield 'Fixed discount' => [
            'processor' => new OrderProcessor(new FixedAmountDiscountStrategy(200)),
            'expectedFinalPrice' => 3800,
        ];

        yield 'Fixed discount greater than product price' => [
            'processor' => new OrderProcessor(new FixedAmountDiscountStrategy(5000)),
            'expectedFinalPrice' => 0,
        ];
    }
}
