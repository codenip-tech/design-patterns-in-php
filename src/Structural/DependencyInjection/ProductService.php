<?php

declare(strict_types=1);

namespace Codenip\Structural\DependencyInjection;

use Codenip\Structural\DependencyInjection\Model\Product;
use Codenip\Structural\DependencyInjection\Repository\ProductRepository;

readonly class ProductService
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {}

    public function createProduct(int $id, string $name, float $price): void
    {
        $product = new Product($id, $name, $price);

        $this->productRepository->save($product);
    }
}
