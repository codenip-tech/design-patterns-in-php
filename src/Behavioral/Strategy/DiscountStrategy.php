<?php

declare(strict_types=1);

namespace Codenip\Behavioral\Strategy;

use Codenip\Behavioral\Strategy\Model\Product;

interface DiscountStrategy
{
    public function calculateDiscount(Product $product): float;
}
