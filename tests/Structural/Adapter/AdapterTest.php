<?php

declare(strict_types=1);

namespace Codenip\Tests\Structural\Adapter;

use Codenip\Structural\Adapter\Client\CurlHttpClient;
use Codenip\Structural\Adapter\Client\GuzzleHttpClient;
use Codenip\Structural\Adapter\Service\ProductService;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function testCreateWithCurl(): void
    {
        $service = new ProductService(new CurlHttpClient());

        $result = $service->createProduct();

        self::assertEquals('cURL', $result);
    }

    public function testCreateWithGuzzle(): void
    {
        $service = new ProductService(new GuzzleHttpClient());

        $result = $service->createProduct();

        self::assertEquals('Guzzle', $result);
    }
}
