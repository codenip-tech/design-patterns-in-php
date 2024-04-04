<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Controller;

use Codenip\Structural\Adapter\Client\CurlHttpClient;
use Codenip\Structural\Adapter\Client\GuzzleHttpClient;
use Codenip\Structural\Adapter\Service\ProductService;

readonly class ProductController
{
    public function createWithCurl(): void
    {
        $service = new ProductService(new CurlHttpClient());
        $service->createProduct();
    }

    public function createWithGuzzle(): void
    {
        $service = new ProductService(new GuzzleHttpClient());
        $service->createProduct();
    }
}
