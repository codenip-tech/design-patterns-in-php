<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Strategy;

use Codenip\Behavioral\Strategy\Model\Product;

use function min;

readonly class FixedAmountDiscountStrategy implements DiscountStrategy
{
    public function __construct(
        private float $amount,
    ) {}

    public function calculateDiscount(Product $product): float
    {
        return min($this->amount, $product->getPrice());
    }
}
