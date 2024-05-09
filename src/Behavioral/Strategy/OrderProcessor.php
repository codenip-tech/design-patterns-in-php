<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Strategy;

use Codenip\Behavioral\Strategy\Model\Product;

class OrderProcessor
{
    public function __construct(
        private DiscountStrategy $strategy,
    ) {}

    public function setDiscountStrategy(DiscountStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function calculateFinalPrice(Product $product): float
    {
        $discount = $this->strategy->calculateDiscount($product);

        return $product->getPrice() - $discount;
    }
}
