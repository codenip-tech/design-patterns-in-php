<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Strategy;

use Codenip\Behavioral\Strategy\Model\Product;

readonly class PercentageDiscountStrategy implements DiscountStrategy
{
    public function __construct(
        private float $percentage,
    ) {}

    public function calculateDiscount(Product $product): float
    {
        $price = $product->getPrice();

        return $price * ($this->percentage / 100);
    }
}
