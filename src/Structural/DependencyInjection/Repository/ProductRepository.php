<?php

declare(strict_types=1);

namespace Codenip\Structural\DependencyInjection\Repository;

use Codenip\Structural\DependencyInjection\Model\Product;

interface ProductRepository
{
    public function save(Product $product): void;
}
