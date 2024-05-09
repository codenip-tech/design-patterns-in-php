<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Strategy;

use Codenip\Behavioral\Strategy\Model\Product;

class NoDiscountStrategy implements DiscountStrategy
{
    public function calculateDiscount(Product $product): float
    {
        return 0.0;
    }
}
