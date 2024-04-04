<?php

declare(strict_types=1);

namespace Codenip\Structural\Adapter\Service;

use Codenip\Structural\Adapter\Client\CurlHttpClient;
use Codenip\Structural\Adapter\Interface\HttpClientInterface;

readonly class ProductService
{
    public function __construct(
        private HttpClientInterface $client,
    ) {}

    public function createProduct(): string
    {
        if ($this->client instanceof CurlHttpClient) {
            return 'cURL';
        }

        return 'Guzzle';
    }
}
