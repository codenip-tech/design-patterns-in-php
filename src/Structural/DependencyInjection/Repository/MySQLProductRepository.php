<?php

declare(strict_types=1);

namespace Codenip\Structural\DependencyInjection\Repository;

use Codenip\Structural\DependencyInjection\Model\Product;

class MySQLProductRepository implements ProductRepository
{
    public function save(Product $product): void
    {
        echo 'Saving product with MySQLProductRepository';
    }
}
